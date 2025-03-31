// src/pages/User.tsx
import { Box, Flex, Avatar, Text, Tabs, TabList, TabPanels, Tab, TabPanel, Button, Input, Progress, Checkbox, VStack, HStack } from '@chakra-ui/react';
import React, { useEffect, useState } from 'react';
import { useParams } from 'react-router-dom';
import Post from '../components/Post';
import { kodoninja } from '../utils/actor';
import { Link } from 'react-router-dom';

const User = () => {
  const { username } = useParams<{ username: string }>();
  const currentUser = localStorage.getItem('username');
  const [profile, setProfile] = useState<{ photoUrl: string; bannerUrl: string }>({ photoUrl: '', bannerUrl: '' });
  const [posts, setPosts] = useState<any[]>([]);
  const [blogs, setBlogs] = useState<any[]>([]);
  const [goals, setGoals] = useState<any[]>([]);
  const [forumThreads, setForumThreads] = useState<any[]>([]);
  const [photoFile, setPhotoFile] = useState<File | null>(null);
  const [bannerFile, setBannerFile] = useState<File | null>(null);
  const [newGoalTitle, setNewGoalTitle] = useState('');
  const [newGoalDescription, setNewGoalDescription] = useState('');
  const [newThreadTitle, setNewThreadTitle] = useState('');
  const [newMessage, setNewMessage] = useState<{ [key: number]: string }>({});
  const [newReply, setNewReply] = useState<{ [key: string]: string }>({});

  useEffect(() => {
    const fetchProfile = async () => {
      if (username) {
        const profileData = await kodoninja.getProfile(username);
        if (profileData) {
          setProfile({ photoUrl: profileData[0], bannerUrl: profileData[1] });
        }
      }
    };

    const fetchPosts = async () => {
      if (username) {
        const userPosts = await kodoninja.getPostsByUser(username);
        setPosts(userPosts);
      }
    };

    const fetchBlogs = async () => {
      if (username) {
        const userBlogs = await kodoninja.getBlogsByUser(username);
        setBlogs(userBlogs);
      }
    };

    const fetchGoals = async () => {
      if (username) {
        const userGoals = await kodoninja.getGoalsByUser(username);
        setGoals(userGoals);
      }
    };

    const fetchForumThreads = async () => {
      if (username) {
        const threads = await kodoninja.getForumThreadsByUser(username);
        setForumThreads(threads);
      }
    };

    fetchProfile();
    fetchPosts();
    fetchBlogs();
    fetchGoals();
    fetchForumThreads();
  }, [username]);

  const handlePhotoUpload = async () => {
    if (photoFile && username) {
      const photoUrl = URL.createObjectURL(photoFile);
      await kodoninja.updateProfile(username, photoUrl, profile.bannerUrl);
      setProfile({ ...profile, photoUrl });
    }
  };

  const handleBannerUpload = async () => {
    if (bannerFile && username) {
      const bannerUrl = URL.createObjectURL(bannerFile);
      await kodoninja.updateProfile(username, profile.photoUrl, bannerUrl);
      setProfile({ ...profile, bannerUrl });
    }
  };

  const handleCreateGoal = async () => {
    if (newGoalTitle.trim() && newGoalDescription.trim() && username) {
      await kodoninja.createGoal(username, newGoalTitle, newGoalDescription);
      setNewGoalTitle('');
      setNewGoalDescription('');
      const userGoals = await kodoninja.getGoalsByUser(username);
      setGoals(userGoals);
    }
  };

  const handleUpdateGoal = async (goalId: number, title: string, description: string, progress: number, completed: boolean) => {
    if (username) {
      await kodoninja.updateGoal(goalId, username, title, description, progress, completed);
      const userGoals = await kodoninja.getGoalsByUser(username);
      setGoals(userGoals);
    }
  };

  const handleCreateThread = async () => {
    if (newThreadTitle.trim() && username) {
      await kodoninja.createForumThread(username, newThreadTitle);
      setNewThreadTitle('');
      const threads = await kodoninja.getForumThreadsByUser(username);
      setForumThreads(threads);
    }
  };

  const handlePostMessage = async (threadId: number) => {
    const message = newMessage[threadId] || '';
    if (message.trim() && username) {
      await kodoninja.postMessage(threadId, username, message);
      setNewMessage((prev) => ({ ...prev, [threadId]: '' }));
      const threads = await kodoninja.getForumThreadsByUser(username);
      setForumThreads(threads);
    }
  };

  const handleReplyToMessage = async (threadId: number, messageId: number) => {
    const reply = newReply[`${threadId}-${messageId}`] || '';
    if (reply.trim() && username) {
      await kodoninja.replyToMessage(threadId, messageId, username, reply);
      setNewReply((prev) => ({ ...prev, [`${threadId}-${messageId}`]: '' }));
      const threads = await kodoninja.getForumThreadsByUser(username);
      setForumThreads(threads);
    }
  };

  return (
    <Box>
      <Box h="200px" bg="gray.700" position="relative">
        {profile.bannerUrl && <img src={profile.bannerUrl} alt="Banner" style={{ width: '100%', height: '100%', objectFit: 'cover' }} />}
        {currentUser === username && (
          <Box position="absolute" bottom={4} right={4}>
            <Input type="file" onChange={(e) => setBannerFile(e.target.files?.[0] || null)} />
            <Button onClick={handleBannerUpload} mt={2} bg="brand.darkRed" color="brand.white">
              Upload Banner
            </Button>
          </Box>
        )}
      </Box>
      <Flex mt={-16} ml={8} align="center">
        <Avatar size="2xl" src={profile.photoUrl} border="4px solid white" />
        {currentUser === username && (
          <Box ml={4}>
            <Input type="file" onChange={(e) => setPhotoFile(e.target.files?.[0] || null)} />
            <Button onClick={handlePhotoUpload} mt={2} bg="brand.darkRed" color="brand.white">
              Upload Photo
            </Button>
          </Box>
        )}
        <Text fontSize="2xl" fontWeight="bold" ml={4}>{username}</Text>
      </Flex>
      <Tabs mt={8}>
        <TabList>
          <Tab>Feed</Tab>
          <Tab>Blogs</Tab>
          <Tab>Goals</Tab>
          <Tab>Forums</Tab>
        </TabList>
        <TabPanels>
          <TabPanel>
            {posts.length > 0 ? (
              posts.map(([postId, postUsername, timestamp, content, mediaUrls, likes, comments]) => (
                <Post
                  key={postId}
                  postId={postId}
                  username={postUsername}
                  timestamp={Number(timestamp)}
                  content={content}
                  mediaUrls={mediaUrls}
                  likes={likes}
                  comments={comments}
                  onDelete={() => alert('Delete functionality coming soon!')}
                  onEdit={() => alert('Edit functionality coming soon!')}
                />
              ))
            ) : (
              <Text>No posts yet.</Text>
            )}
          </TabPanel>
          <TabPanel>
            {blogs.length > 0 ? (
              blogs.map(([id, _username, title, _content, timestamp]) => (
                <Link to={`/blog/${id}`} key={id}>
                  <Box p={4} borderWidth="1px" borderRadius="md" mb={4}>
                    <Text fontSize="xl">{title}</Text>
                    <Text fontSize="sm" color="gray.500">
                      {new Date(Number(timestamp) / 1000000).toLocaleString()}
                    </Text>
                  </Box>
                </Link>
              ))
            ) : (
              <Text>No blogs yet.</Text>
            )}
          </TabPanel>
          <TabPanel>
            {currentUser === username && (
              <Box mb={4}>
                <Text fontSize="lg" fontWeight="bold">Create a New Goal</Text>
                <Input
                  placeholder="Goal Title"
                  value={newGoalTitle}
                  onChange={(e) => setNewGoalTitle(e.target.value)}
                  mb={2}
                />
                <Input
                  placeholder="Goal Description"
                  value={newGoalDescription}
                  onChange={(e) => setNewGoalDescription(e.target.value)}
                  mb={2}
                />
                <Button onClick={handleCreateGoal} bg="brand.darkRed" color="brand.white">
                  Add Goal
                </Button>
              </Box>
            )}
            {goals.length > 0 ? (
              <VStack spacing={4}>
                {goals.map(([id, _username, title, description, progress, completed, timestamp]) => (
                  <Box key={id} p={4} borderWidth="1px" borderRadius="md" width="100%">
                    <Text fontSize="xl" fontWeight="bold">{title}</Text>
                    <Text>{description}</Text>
                    <Text fontSize="sm" color="gray.500">
                      Created: {new Date(Number(timestamp) / 1000000).toLocaleString()}
                    </Text>
                    <Text mt={2}>Progress: {progress}%</Text>
                    <Progress value={progress} colorScheme={completed ? "green" : "blue"} />
                    {currentUser === username && (
                      <Box mt={2}>
                        <Input
                          type="number"
                          placeholder="Update Progress (0-100)"
                          onChange={(e) => {
                            const newProgress = Number(e.target.value);
                            if (newProgress >= 0 && newProgress <= 100) {
                              handleUpdateGoal(id, title, description, newProgress, completed);
                            }
                          }}
                          mb={2}
                        />
                        <Checkbox
                          isChecked={completed}
                          onChange={(e) => handleUpdateGoal(id, title, description, progress, e.target.checked)}
                        >
                          Mark as Completed
                        </Checkbox>
                      </Box>
                    )}
                  </Box>
                ))}
              </VStack>
            ) : (
              <Text>No goals yet.</Text>
            )}
          </TabPanel>
          <TabPanel>
            {currentUser === username && (
              <Box mb={4}>
                <Text fontSize="lg" fontWeight="bold">Create a New Thread</Text>
                <Input
                  placeholder="Thread Title"
                  value={newThreadTitle}
                  onChange={(e) => setNewThreadTitle(e.target.value)}
                  mb={2}
                />
                <Button onClick={handleCreateThread} bg="brand.darkRed" color="brand.white">
                  Create Thread
                </Button>
              </Box>
            )}
            {forumThreads.length > 0 ? (
              <VStack spacing={4}>
                {forumThreads.map(([threadId, threadUsername, title, timestamp, messages]) => (
                  <Box key={threadId} p={4} borderWidth="1px" borderRadius="md" width="100%">
                    <HStack justify="space-between">
                      <Text fontSize="xl" fontWeight="bold">{title}</Text>
                      <Text fontSize="sm" color="gray.500">
                        {new Date(Number(timestamp) / 1000000).toLocaleString()} by {threadUsername}
                      </Text>
                    </HStack>
                    <Box mt={2}>
                      {messages.length > 0 ? (
                        messages.map(([messageId, messageUsername, content, messageTimestamp, replies]: [number, string, string, bigint, [string, string, bigint][]]) => (
                          <Box key={messageId} ml={4} mt={2}>
                            <HStack>
                              <Avatar size="xs" name={messageUsername} />
                              <Text fontWeight="bold">{messageUsername}</Text>
                              <Text fontSize="sm" color="gray.500">
                                {new Date(Number(messageTimestamp) / 1000000).toLocaleString()}
                              </Text>
                            </HStack>
                            <Text ml={8}>{content}</Text>
                            <Button
                              size="sm"
                              ml={8}
                              mt={1}
                              onClick={() =>
                                setNewReply((prev) => ({
                                  ...prev,
                                  [`${threadId}-${messageId}`]: prev[`${threadId}-${messageId}`] || '',
                                }))
                              }
                            >
                              Reply
                            </Button>
                            {newReply[`${threadId}-${messageId}`] !== undefined && (
                              <Flex ml={8} mt={2} align="center">
                                <Input
                                  placeholder="Add a reply..."
                                  value={newReply[`${threadId}-${messageId}`]}
                                  onChange={(e) =>
                                    setNewReply((prev) => ({
                                      ...prev,
                                      [`${threadId}-${messageId}`]: e.target.value,
                                    }))
                                  }
                                  mr={2}
                                />
                                <Button
                                  onClick={() => handleReplyToMessage(threadId, messageId)}
                                  bg="brand.darkRed"
                                  color="brand.white"
                                  size="sm"
                                >
                                  Reply
                                </Button>
                              </Flex>
                            )}
                            {replies.length > 0 && (
                              <Box ml={12}>
                                {replies.map(([replyUsername, replyContent, replyTimestamp], replyIndex) => (
                                  <Box key={replyIndex} mt={1}>
                                    <HStack>
                                      <Avatar size="xs" name={replyUsername} />
                                      <Text fontWeight="bold">{replyUsername}</Text>
                                      <Text fontSize="sm" color="gray.500">
                                        {new Date(Number(replyTimestamp) / 1000000).toLocaleString()}
                                      </Text>
                                    </HStack>
                                    <Text ml={4}>{replyContent}</Text>
                                  </Box>
                                ))}
                              </Box>
                            )}
                          </Box>
                        ))
                      ) : (
                        <Text ml={4}>No messages yet.</Text>
                      )}
                    </Box>
                    <Flex mt={2} align="center">
                      <Input
                        placeholder="Add a message..."
                        value={newMessage[threadId] || ''}
                        onChange={(e) =>
                          setNewMessage((prev) => ({ ...prev, [threadId]: e.target.value }))
                        }
                        mr={2}
                      />
                      <Button
                        onClick={() => handlePostMessage(threadId)}
                        bg="brand.darkRed"
                        color="brand.white"
                      >
                        Post Message
                      </Button>
                    </Flex>
                  </Box>
                ))}
              </VStack>
            ) : (
              <Text>No forum threads yet.</Text>
            )}
          </TabPanel>
        </TabPanels>
      </Tabs>
    </Box>
  );
};

export default User;