// src/kodoninja_backend/main.mo
import Text "mo:base/Text";
import Map "mo:base/HashMap";
import List "mo:base/List";
import Time "mo:base/Time";
import Array "mo:base/Array";
import Nat "mo:base/Nat";
import Iter "mo:base/Iter";

actor {
  // Store users: username -> password
  let users = Map.HashMap<Text, Text>(0, Text.equal, Text.hash);
  // Store user profiles: username -> (photoUrl, bannerUrl)
  let profiles = Map.HashMap<Text, (Text, Text)>(0, Text.equal, Text.hash);
  // Store posts: list of (id, username, timestamp, content, mediaUrls, likes, comments)
  var posts = List.nil<(Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)>();
  var nextPostId: Nat = 0;
  var nextCommentId: Nat = 0;
  // Store blogs: list of (id, username, title, content, timestamp)
  var blogs = List.nil<(Nat, Text, Text, Text, Time.Time)>();
  var nextBlogId: Nat = 0;
  // Store goals: list of (id, username, title, description, progress, completed, timestamp)
  var goals = List.nil<(Nat, Text, Text, Text, Nat, Bool, Time.Time)>();
  var nextGoalId: Nat = 0;
  // Store forum threads: list of (id, username, title, timestamp, messages)
  var forumThreads = List.nil<(Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)>();
  var nextThreadId: Nat = 0;
  var nextMessageId: Nat = 0;
  // Store tests: list of (id, username, title, questions, timestamp)
  // question: (text, options, correctAnswerIndex)
  var tests = List.nil<(Nat, Text, Text, List.List<(Text, List.List<Text>, Nat)>, Time.Time)>();
  var nextTestId: Nat = 0;
  // Store test results: list of (testId, username, score, timestamp)
  var testResults = List.nil<(Nat, Text, Nat, Time.Time)>();

  // Register a new user
  public func register(username: Text, password: Text): async Bool {
    switch (users.get(username)) {
      case (?_) { return false; };
      case null {
        users.put(username, password);
        profiles.put(username, ("", ""));
        return true;
      };
    };
  };

  // Login a user
  public func login(username: Text, password: Text): async Bool {
    switch (users.get(username)) {
      case (?storedPassword) { return storedPassword == password; };
      case null { return false; };
    };
  };

  // Update user profile
  public func updateProfile(username: Text, photoUrl: Text, bannerUrl: Text): async Bool {
    switch (users.get(username)) {
      case (?_) {
        profiles.put(username, (photoUrl, bannerUrl));
        return true;
      };
      case null { return false; };
    };
  };

  // Get user profile
  public query func getProfile(username: Text): async ?(Text, Text) {
    profiles.get(username)
  };

  // Create a post with media
  public func createPost(username: Text, content: Text, mediaUrls: [Text]): async Nat {
    let postId = nextPostId;
    nextPostId += 1;
    let timestamp = Time.now();
    posts := List.push((postId, username, timestamp, content, List.fromArray(mediaUrls), 0, List.nil<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>()), posts);
    postId
  };

  // Like a post
  public func likePost(postId: Nat, username: Text): async Bool {
    let postOpt = List.find(posts, func ((id, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
      id == postId
    });
    switch (postOpt) {
      case (?(id, u, t, c, media, likes, com)) {
        posts := List.filter(posts, func ((pId, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
          pId != postId
        });
        posts := List.push((id, u, t, c, media, likes + 1, com), posts);
        return true;
      };
      case null { return false; };
    };
  };

  // Add a comment to a post
  public func addComment(postId: Nat, username: Text, comment: Text, mediaUrls: [Text]): async Nat {
    let postOpt = List.find(posts, func ((id, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
      id == postId
    });
    switch (postOpt) {
      case (?(id, u, t, c, media, likes, comments)) {
        let commentId = nextCommentId;
        nextCommentId += 1;
        posts := List.filter(posts, func ((pId, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
          pId != postId
        });
        let updatedComments = List.push((commentId, username, comment, List.fromArray(mediaUrls), 0, List.nil<(Text, Text, List.List<Text>)>()), comments);
        posts := List.push((id, u, t, c, media, likes, updatedComments), posts);
        return commentId;
      };
      case null { return 0; };
    };
  };

  // Like a comment
  public func likeComment(postId: Nat, commentId: Nat, username: Text): async Bool {
    let postOpt = List.find(posts, func ((id, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
      id == postId
    });
    switch (postOpt) {
      case (?(id, u, t, c, media, likes, comments)) {
        let commentOpt = List.find(comments, func ((cId, _, _, _, _, _): (Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)): Bool {
          cId == commentId
        });
        switch (commentOpt) {
          case (?(cId, cUser, cText, cMedia, cLikes, cReplies)) {
            posts := List.filter(posts, func ((pId, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
              pId != postId
            });
            let updatedComments = List.filter(comments, func ((cId2, _, _, _, _, _): (Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)): Bool {
              cId2 != commentId
            });
            let updatedComment = (cId, cUser, cText, cMedia, cLikes + 1, cReplies);
            let newComments = List.push(updatedComment, updatedComments);
            posts := List.push((id, u, t, c, media, likes, newComments), posts);
            return true;
          };
          case null { return false; };
        };
      };
      case null { return false; };
    };
  };

  // Reply to a comment
  public func replyToComment(postId: Nat, commentId: Nat, username: Text, reply: Text, mediaUrls: [Text]): async Bool {
    let postOpt = List.find(posts, func ((id, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
      id == postId
    });
    switch (postOpt) {
      case (?(id, u, t, c, media, likes, comments)) {
        let commentOpt = List.find(comments, func ((cId, _, _, _, _, _): (Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)): Bool {
          cId == commentId
        });
        switch (commentOpt) {
          case (?(cId, cUser, cText, cMedia, cLikes, cReplies)) {
            posts := List.filter(posts, func ((pId, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
              pId != postId
            });
            let updatedComments = List.filter(comments, func ((cId2, _, _, _, _, _): (Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)): Bool {
              cId2 != commentId
            });
            let updatedReplies = List.push((username, reply, List.fromArray(mediaUrls)), cReplies);
            let updatedComment = (cId, cUser, cText, cMedia, cLikes, updatedReplies);
            let newComments = List.push(updatedComment, updatedComments);
            posts := List.push((id, u, t, c, media, likes, newComments), posts);
            return true;
          };
          case null { return false; };
        };
      };
      case null { return false; };
    };
  };

  // Get posts by user
  public query func getPostsByUser(username: Text): async [(Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)] {
    let userPosts = List.filter(posts, func ((_, postUsername, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
      postUsername == username
    });
    List.toArray(userPosts)
  };

  // Get all posts
  public query func getPosts(): async [(Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)] {
    List.toArray(posts)
  };

  // Create a blog
  public func createBlog(username: Text, title: Text, content: Text): async Nat {
    let blogId = nextBlogId;
    nextBlogId += 1;
    let timestamp = Time.now();
    blogs := List.push((blogId, username, title, content, timestamp), blogs);
    blogId
  };

  // Update a blog
  public func updateBlog(blogId: Nat, username: Text, title: Text, content: Text): async Bool {
    let blog = List.find(blogs, func ((id, _, _, _, _): (Nat, Text, Text, Text, Time.Time)): Bool {
      id == blogId
    });
    switch (blog) {
      case (?(_, blogUsername, _, _, _)) {
        if (blogUsername == username) {
          blogs := List.filter(blogs, func ((id, _, _, _, _): (Nat, Text, Text, Text, Time.Time)): Bool {
            id != blogId
          });
          blogs := List.push((blogId, username, title, content, Time.now()), blogs);
          return true;
        };
        return false;
      };
      case null { return false; };
    };
  };

  // Get blog by ID
  public query func getBlog(blogId: Nat): async ?(Nat, Text, Text, Text, Time.Time) {
    List.find(blogs, func ((id, _, _, _, _): (Nat, Text, Text, Text, Time.Time)): Bool {
      id == blogId
    })
  };

  // Get blogs by user
  public query func getBlogsByUser(username: Text): async [(Nat, Text, Text, Text, Time.Time)] {
    let userBlogs = List.filter(blogs, func ((_, blogUsername, _, _, _): (Nat, Text, Text, Text, Time.Time)): Bool {
      blogUsername == username
    });
    List.toArray(userBlogs)
  };

  // Get all blogs
  public query func getAllBlogs(): async [(Nat, Text, Text, Text, Time.Time)] {
    List.toArray(blogs)
  };

  // Create a goal
  public func createGoal(username: Text, title: Text, description: Text): async Nat {
    let goalId = nextGoalId;
    nextGoalId += 1;
    let timestamp = Time.now();
    goals := List.push((goalId, username, title, description, 0, false, timestamp), goals);
    goalId
  };

  // Update a goal
  public func updateGoal(goalId: Nat, username: Text, title: Text, description: Text, progress: Nat, completed: Bool): async Bool {
    let goal = List.find(goals, func ((id, _, _, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Bool {
      id == goalId
    });
    switch (goal) {
      case (?(_, goalUsername, _, _, _, _, _)) {
        if (goalUsername == username) {
          goals := List.filter(goals, func ((id, _, _, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Bool {
            id != goalId
          });
          goals := List.push((goalId, username, title, description, progress, completed, Time.now()), goals);
          return true;
        };
        return false;
      };
      case null { return false; };
    };
  };

  // Get goal by ID
  public query func getGoal(goalId: Nat): async ?(Nat, Text, Text, Text, Nat, Bool, Time.Time) {
    List.find(goals, func ((id, _, _, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Bool {
      id == goalId
    })
  };

  // Get goals by user
  public query func getGoalsByUser(username: Text): async [(Nat, Text, Text, Text, Nat, Bool, Time.Time)] {
    let userGoals = List.filter(goals, func ((_, goalUsername, _, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Bool {
      goalUsername == username
    });
    List.toArray(userGoals)
  };

  // Get all goals
  public query func getAllGoals(): async [(Nat, Text, Text, Text, Nat, Bool, Time.Time)] {
    List.toArray(goals)
  };

  // Create a forum thread
  public func createForumThread(username: Text, title: Text): async Nat {
    let threadId = nextThreadId;
    nextThreadId += 1;
    let timestamp = Time.now();
    forumThreads := List.push((threadId, username, title, timestamp, List.nil<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>()), forumThreads);
    threadId
  };

  // Post a message in a forum thread
  public func postMessage(threadId: Nat, username: Text, content: Text): async Nat {
    let threadOpt = List.find(forumThreads, func ((id, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
      id == threadId
    });
    switch (threadOpt) {
      case (?(id, u, t, timestamp, messages)) {
        let messageId = nextMessageId;
        nextMessageId += 1;
        forumThreads := List.filter(forumThreads, func ((tId, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
          tId != threadId
        });
        let updatedMessages = List.push((messageId, username, content, Time.now(), List.nil<(Text, Text, Time.Time)>()), messages);
        forumThreads := List.push((id, u, t, timestamp, updatedMessages), forumThreads);
        return messageId;
      };
      case null { return 0; };
    };
  };

  // Reply to a message in a forum thread
  public func replyToMessage(threadId: Nat, messageId: Nat, username: Text, content: Text): async Bool {
    let threadOpt = List.find(forumThreads, func ((id, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
      id == threadId
    });
    switch (threadOpt) {
      case (?(id, u, t, timestamp, messages)) {
        let messageOpt = List.find(messages, func ((mId, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)): Bool {
          mId == messageId
        });
        switch (messageOpt) {
          case (?(mId, mUser, mContent, mTimestamp, replies)) {
            forumThreads := List.filter(forumThreads, func ((tId, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
              tId != threadId
            });
            let updatedMessages = List.filter(messages, func ((mId2, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)): Bool {
              mId2 != messageId
            });
            let updatedReplies = List.push((username, content, Time.now()), replies);
            let updatedMessage = (mId, mUser, mContent, mTimestamp, updatedReplies);
            let newMessages = List.push(updatedMessage, updatedMessages);
            forumThreads := List.push((id, u, t, timestamp, newMessages), forumThreads);
            return true;
          };
          case null { return false; };
        };
      };
      case null { return false; };
    };
  };

  // Get forum threads by user
  public query func getForumThreadsByUser(username: Text): async [(Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)] {
    let userThreads = List.filter(forumThreads, func ((_, threadUsername, _, _, _): (Nat, Text, Text, Time.Time, 🙂List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
      threadUsername == username
    });
    List.toArray(userThreads)
  };

  // Get all forum threads
  public query func getAllForumThreads(): async [(Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)] {
    List.toArray(forumThreads)
  };

  // Get forum thread by ID
  public query func getForumThread(threadId: Nat): async ?(Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>) {
    List.find(forumThreads, func ((id, _, _, _, _): (Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
      id == threadId
    })
  };

  // Create a test
  public func createTest(username: Text, title: Text, questions: [(Text, [Text], Nat)]): async Nat {
    let testId = nextTestId;
    nextTestId += 1;
    let timestamp = Time.now();
    tests := List.push((testId, username, title, List.fromArray(questions), timestamp), tests);
    testId
  };

  // Submit test answers and get score
  public func submitTest(testId: Nat, username: Text, answers: [Nat]): async Nat {
    let testOpt = List.find(tests, func ((id, _, _, _, _): (Nat, Text, Text, List.List<(Text, List.List<Text>, Nat)>, Time.Time)): Bool {
      id == testId
    });
    switch (testOpt) {
      case (?(id, _, _, questions, _)) {
        var score = 0;
        let questionArray = List.toArray(questions);
        for (i in Iter.range(0, questionArray.size() - 1)) {
          if (i < answers.size() and answers[i] == questionArray[i].2) {
            score += 1;
          };
        };
        testResults := List.push((testId, username, score, Time.now()), testResults);
        score
      };
      case null { 0 };
    };
  };

  // Get tests by user
  public query func getTestsByUser(username: Text): async [(Nat, Text, Text, List.List<(Text, List.List<Text>, Nat)>, Time.Time)] {
    let userTests = List.filter(tests, func ((_, testUsername, _, _, _): (Nat, Text, Text, List.List<(Text, List.List<Text>, Nat)>, Time.Time)): Bool {
      testUsername == username
    });
    List.toArray(userTests)
  };

  // Get test results for a user
  public query func getTestResults(username: Text): async [(Nat, Text, Nat, Time.Time)] {
    let userResults = List.filter(testResults, func ((_, resultUsername, _, _): (Nat, Text, Nat, Time.Time)): Bool {
      resultUsername == username
    });
    List.toArray(userResults)
  };

  // Recommend blogs based on user's goals
  public query func recommendBlogs(username: Text): async [(Nat, Text, Text, Text, Time.Time)] {
    let userGoals = List.filter(goals, func ((_, goalUsername, _, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Bool {
      goalUsername == username
    });
    let goalTitles = List.map(userGoals, func ((_, _, title, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Text { title });
    let recommendedBlogs = List.filter(blogs, func ((_, _, blogTitle, _, _): (Nat, Text, Text, Text, Time.Time)): Bool {
      for (goalTitle in Iter.fromList(goalTitles)) {
        if (Text.contains(blogTitle, #text goalTitle)) {
          return true;
        };
      };
      false
    });
    List.toArray(recommendedBlogs)
  };

  // Recommend forum threads based on user's goals
  public query func recommendForumThreads(username: Text): async [(Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)] {
    let userGoals = List.filter(goals, func ((_, goalUsername, _, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Bool {
      goalUsername == username
    });
    let goalTitles = List.map(userGoals, func ((_, _, title, _, _, _, _): (Nat, Text, Text, Text, Nat, Bool, Time.Time)): Text { title });
    let recommendedThreads = List.filter(forumThreads, func ((_, _, threadTitle, _, _): (Nat, Text, Text, Time.Time, List.List<(Nat, Text, Text, Time.Time, List.List<(Text, Text, Time.Time)>)>)): Bool {
      for (goalTitle in Iter.fromList(goalTitles)) {
        if (Text.contains(threadTitle, #text goalTitle)) {
          return true;
        };
      };
      false
    });
    List.toArray(recommendedThreads)
  };

  // Greet function (for testing)
  public func greet(name: Text): async Text {
    return "Hello, " # name # "!";
  };
};