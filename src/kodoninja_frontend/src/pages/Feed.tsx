// src/pages/Feed.tsx
import { Box, Text, Select, Button, Input, VStack, HStack, IconButton } from '@chakra-ui/react';
import { AttachmentIcon } from '@chakra-ui/icons';
import React, { useEffect, useState } from 'react';
import Post from '../components/Post';
import { kodoninja } from '../utils/actor';

const Feed = () => {
  const [posts, setPosts] = useState<any[]>([]);
  const [filter, setFilter] = useState('all');
  const [newPostContent, setNewPostContent] = useState('');
  const [mediaFiles, setMediaFiles] = useState<File[]>([]);
  const username = localStorage.getItem('username') || 'Anonymous';

  useEffect(() => {
    const fetchPosts = async () => {
      try {
        const fetchedPosts = await kodoninja.getPosts();
        setPosts(fetchedPosts);
      } catch (err) {
        console.error('Error fetching posts:', err);
      }
    };
    fetchPosts();
  }, []);

  const handleMediaChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    if (e.target.files) {
      const files = Array.from(e.target.files).slice(0, 4); // Limit to 4 files
      setMediaFiles(files);
    }
  };

  const handleCreatePost = async () => {
    if (newPostContent.trim() || mediaFiles.length > 0) {
      try {
        // Simulate uploading media files and getting URLs
        const mediaUrls = mediaFiles.map(file => URL.createObjectURL(file));
        await kodoninja.createPost(username, newPostContent, mediaUrls);
        setNewPostContent('');
        setMediaFiles([]);
        const updatedPosts = await kodoninja.getPosts();
        setPosts(updatedPosts);
      } catch (err) {
        console.error('Error creating post:', err);
      }
    }
  };

  return (
    <Box>
      <Text fontSize="2xl" mb={4}>Feed</Text>
      <VStack mb={6}>
        <Input
          placeholder="What's on your mind?"
          value={newPostContent}
          onChange={(e) => setNewPostContent(e.target.value)}
        />
        <HStack>
          <IconButton
            as="label"
            htmlFor="media-upload"
            icon={<AttachmentIcon />}
            aria-label="Upload media"
            variant="outline"
          />
          <Input
            id="media-upload"
            type="file"
            accept="image/*,video/*"
            multiple
            onChange={handleMediaChange}
            display="none"
          />
          <Text>{mediaFiles.length} file(s) selected</Text>
        </HStack>
        <Button onClick={handleCreatePost} bg="brand.darkRed" color="brand.white">
          Post
        </Button>
      </VStack>
      <Select mb={4} maxW="200px" onChange={(e) => setFilter(e.target.value)}>
        <option value="all">All</option>
        <option value="posts">Posts</option>
        <option value="media">Media</option>
        <option value="blogs">Blogs</option>
        <option value="goals">Goals</option>
        <option value="forums">Forums</option>
      </Select>
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
    </Box>
  );
};

export default Feed;