// src/kodoninja_backend/main.mo
import Text "mo:base/Text";
import Map "mo:base/HashMap";
import List "mo:base/List";
import Time "mo:base/Time";
import Array "mo:base/Array";
import Nat "mo:base/Nat";
import Nat32 "mo:base/Nat32";

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
    let postId = Nat32.toNat(Nat32.fromNat(nextPostId)); // Convert to Nat
    nextPostId += 1;
    let timestamp = Time.now();
    posts := List.push(
      (postId, username, timestamp, content, List.fromArray(mediaUrls), 0, List.nil<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>()),
      posts
    );
    return postId;
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
    let commentId = Nat32.toNat(Nat32.fromNat(nextCommentId)); // Convert to Nat
    nextCommentId += 1;
    let postOpt = List.find(posts, func ((id, _, _, _, _, _, _): (Nat, Text, Time.Time, Text, List.List<Text>, Nat, List.List<(Nat, Text, Text, List.List<Text>, Nat, List.List<(Text, Text, List.List<Text>)>)>)): Bool {
      id == postId
    });
    switch (postOpt) {
      case (?(id, u, t, c, media, likes, comments)) {
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
    let blogId = Nat32.toNat(Nat32.fromNat(nextBlogId)); // Convert to Nat
    nextBlogId += 1;
    let timestamp = Time.now();
    blogs := List.push((blogId, username, title, content, timestamp), blogs);
    return blogId;
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

  // Greet function (for testing)
  public func greet(name: Text): async Text {
    return "Hello, " # name # "!";
  };
};