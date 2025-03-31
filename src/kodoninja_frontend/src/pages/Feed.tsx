// src/pages/Feed.tsx
import {
  Box,
  Text,
  Select,
  Button,
  Input,
  VStack,
  HStack,
  IconButton,
  useToast,
  SimpleGrid,
} from '@chakra-ui/react';
import { AddIcon } from '@chakra-ui/icons';
import React, { useEffect, useState } from 'react';
import Post from '../components/Post';
import { kodoninja } from '../utils/actor';

const Feed = () => {
  const [posts, setPosts] = useState<any[]>([]);
  const [filter, setFilter] = useState('all');
  const [newPostContent, setNewPostContent] = useState('');
  const [mediaFiles, setMediaFiles] = useState<File[]>([]);
  const username = localStorage.getItem('username') || 'Anonymous';
  const toast = useToast();

  useEffect(() => {
    const fetchPosts = async () => {
      try {
        const fetchedPosts = await kodoninja.getPosts();
        setPosts(fetchedPosts);
      } catch (err) {
        console.error('Error fetching posts:', err);
        toast({
          title: 'Error',
          description: 'Failed to fetch posts.',
          status: 'error',
          duration: 3000,
          isClosable: true,
        });
      }
    };
    fetchPosts();
  }, [toast]);

  const handleMediaChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    if (e.target.files) {
      const files = Array.from(e.target.files).slice(0, 4); // Limit to 4 files
      setMediaFiles(files);
    }
  };

  const handleCreatePost = async () => {
    if (newPostContent.trim() || mediaFiles.length > 0) {
      try {
        const mediaUrls = mediaFiles.map((file) => URL.createObjectURL(file));
        await kodoninja.createPost(username, newPostContent, mediaUrls);
        setNewPostContent('');
        setMediaFiles([]);
        const updatedPosts = await kodoninja.getPosts();
        setPosts(updatedPosts);
        toast({
          title: 'Success',
          description: 'Post created successfully!',
          status: 'success',
          duration: 3000,
          isClosable: true,
        });
      } catch (err) {
        console.error('Error creating post:', err);
        toast({
          title: 'Error',
          description: 'Failed to create post.',
          status: 'error',
          duration: 3000,
          isClosable: true,
        });
      }
    } else {
      toast({
        title: 'Warning',
        description: 'Please add some content or media to your post.',
        status: 'warning',
        duration: 3000,
        isClosable: true,
      });
    }
  };

  // Filter posts based on the selected filter
  const filteredPosts = posts.filter((post) => {
    if (filter === 'all') return true;
    if (filter === 'posts') return post[3] !== ''; // Check if content exists
    if (filter === 'media') return post[4].length > 0; // Check if mediaUrls exist
    // For now, blogs, goals, and forums will return empty since we're only handling posts
    return false;
  });

  return (
    <Box maxW="800px" mx="auto" py={6} px={4}>
      <Text fontSize="3xl" fontWeight="bold" mb={6} textAlign="center">
        Feed
      </Text>
      {/* Post Creation Form */}
      <VStack spacing={4} mb={8} p={4} bg="gray.50" borderRadius="md" boxShadow="sm">
        <Input
          placeholder="What's on your mind?"
          value={newPostContent}
          onChange={(e) => setNewPostContent(e.target.value)}
          size="lg"
          bg="white"
          borderColor="gray.300"
        />
        <HStack w="full" justify="space-between">
          <HStack>
            <IconButton
              as="label"
              htmlFor="media-upload"
              icon={<AddIcon />}
              aria-label="Upload media"
              variant="outline"
              colorScheme="teal"
            />
            <Input
              id="media-upload"
              type="file"
              accept="image/*,video/*"
              multiple
              onChange={handleMediaChange}
              display="none"
            />
            <Text fontSize="sm" color="gray.600">
              {mediaFiles.length} file(s) selected
            </Text>
          </HStack>
          <Button
            onClick={handleCreatePost}
            bg="brand.darkRed"
            color="brand.white"
            _hover={{ bg: 'brand.darkRedHover' }}
            size="lg"
          >
            Post
          </Button>
        </HStack>
      </VStack>
      {/* Filter Dropdown */}
      <Select
        mb={6}
        maxW="200px"
        onChange={(e) => setFilter(e.target.value)}
        value={filter}
        bg="white"
        borderColor="gray.300"
      >
        <option value="all">All</option>
        <option value="posts">Posts</option>
        <option value="media">Media</option>
        <option value="blogs">Blogs</option>
        <option value="goals">Goals</option>
        <option value="forums">Forums</option>
      </Select>
      {/* Posts List */}
      {filteredPosts.length > 0 ? (
        <SimpleGrid columns={{ base: 1, md: 1 }} spacing={6}>
          {filteredPosts.map(
            ([postId, postUsername, timestamp, content, mediaUrls, likes, comments]) => (
              <Post
                key={postId}
                postId={postId}
                username={postUsername}
                timestamp={Number(timestamp)}
                content={content}
                mediaUrls={mediaUrls}
                likes={likes}
                comments={comments}
                onDelete={() => {
                  setPosts(posts.filter((post) => post[0] !== postId));
                  toast({
                    title: 'Post Deleted',
                    description: 'The post has been deleted (mock).',
                    status: 'info',
                    duration: 3000,
                    isClosable: true,
                  });
                }}
                onEdit={() => {
                  const newContent = prompt('Edit post content:', content);
                  if (newContent) {
                    setPosts(
                      posts.map((post) =>
                        post[0] === postId ? [postId, postUsername, timestamp, newContent, mediaUrls, likes, comments] : post
                      )
                    );
                    toast({
                      title: 'Post Updated',
                      description: 'The post has been updated (mock).',
                      status: 'success',
                      duration: 3000,
                      isClosable: true,
                    });
                  }
                }}
              />
            )
          )}
        </SimpleGrid>
      ) : (
        <Text textAlign="center" color="gray.500">
          No posts to display.
        </Text>
      )}
    </Box>
  );
};

export default Feed;