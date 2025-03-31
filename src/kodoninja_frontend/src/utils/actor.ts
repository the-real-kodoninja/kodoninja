// src/utils/actor.ts
// Temporarily mock the backend interaction for frontend development

// Mocked kodoninja actor with sample data
export const kodoninja = {
  getPosts: async () => {
    // Mocked posts data
    return [
      [
        1, // postId
        "user1", // username
        BigInt(Date.now()) * BigInt(1000000), // timestamp (in nanoseconds)
        "This is a sample post!", // content
        ["https://via.placeholder.com/150"], // mediaUrls
        5, // likes
        [], // comments
      ],
      [
        2,
        "user2",
        BigInt(Date.now()) * BigInt(1000000),
        "Another post with a video!",
        ["https://via.placeholder.com/150"],
        3,
        [],
      ],
    ];
  },
  createPost: async (username: string, content: string, mediaUrls: string[]) => {
    console.log(`Mock: Creating post by ${username}: ${content} with media ${mediaUrls}`);
    return 3; // Mocked post ID
  },
  getProfile: async (username: string) => {
    return ["https://via.placeholder.com/50", "https://via.placeholder.com/200x50"]; // Mocked photoUrl, bannerUrl
  },
  updateProfile: async (username: string, photoUrl: string, bannerUrl: string) => {
    console.log(`Mock: Updating profile for ${username}: photo=${photoUrl}, banner=${bannerUrl}`);
    return true;
  },
  getPostsByUser: async (username: string) => {
    return [
      [
        1,
        username,
        BigInt(Date.now()) * BigInt(1000000),
        "User's sample post!",
        ["https://via.placeholder.com/150"],
        2,
        [],
      ],
    ];
  },
  getBlogsByUser: async (username: string) => {
    return [
      [1, username, "Sample Blog", "Blog content", BigInt(Date.now()) * BigInt(1000000)],
    ];
  },
  getGoalsByUser: async (username: string) => {
    return [
      [
        1,
        username,
        "Sample Goal",
        "Goal description",
        50,
        false,
        BigInt(Date.now()) * BigInt(1000000),
      ],
    ];
  },
  createGoal: async (username: string, title: string, description: string) => {
    console.log(`Mock: Creating goal for ${username}: ${title} - ${description}`);
    return 2; // Mocked goal ID
  },
  updateGoal: async (
    goalId: number,
    username: string,
    title: string,
    description: string,
    progress: number,
    completed: boolean
  ) => {
    console.log(
      `Mock: Updating goal ${goalId} for ${username}: ${title}, ${description}, progress=${progress}, completed=${completed}`
    );
    return true;
  },
  getForumThreadsByUser: async (username: string) => {
    return [
      [
        1,
        username,
        "Sample Thread",
        BigInt(Date.now()) * BigInt(1000000),
        [],
      ],
    ];
  },
  createForumThread: async (username: string, title: string) => {
    console.log(`Mock: Creating forum thread for ${username}: ${title}`);
    return 2; // Mocked thread ID
  },
  postMessage: async (threadId: number, username: string, content: string) => {
    console.log(`Mock: Posting message in thread ${threadId} by ${username}: ${content}`);
    return 1; // Mocked message ID
  },
  replyToMessage: async (threadId: number, messageId: number, username: string, content: string) => {
    console.log(
      `Mock: Replying to message ${messageId} in thread ${threadId} by ${username}: ${content}`
    );
    return true;
  },
};