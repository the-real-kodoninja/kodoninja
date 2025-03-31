// src/pages/User.tsx
import { Box, Flex, Avatar, Text, Tabs, TabList, TabPanels, Tab, TabPanel, Button, Input } from '@chakra-ui/react';
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
  const [photoFile, setPhotoFile] = useState<File | null>(null);
  const [bannerFile, setBannerFile] = useState<File | null>(null);

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

    fetchProfile();
    fetchPosts();
    fetchBlogs();
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
              blogs.map(([id, _, title, _, timestamp]) => (
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
            <Text>Goals coming soon!</Text>
          </TabPanel>
          <TabPanel>
            <Text>Forums coming soon!</Text>
          </TabPanel>
        </TabPanels>
      </Tabs>
    </Box>
  );
};

export default User;