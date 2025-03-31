// src/pages/BlogView.tsx
import { Box, Text, Flex, Avatar } from '@chakra-ui/react';
import React, { useEffect, useState } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { kodoninja } from '../utils/actor';

const BlogView = () => {
  const { blogId } = useParams<{ blogId: string }>();
  const [blog, setBlog] = useState<any>(null);
  const navigate = useNavigate();
  const currentUser = localStorage.getItem('username');

  useEffect(() => {
    const fetchBlog = async () => {
      if (blogId) {
        const blogData = await kodoninja.getBlog(Number(blogId));
        if (blogData) {
          setBlog(blogData);
        }
      }
    };
    fetchBlog();
  }, [blogId]);

  if (!blog) {
    return <Text>Loading...</Text>;
  }

  const [id, username, title, content, timestamp] = blog;
  const date = new Date(Number(timestamp) / 1000000).toLocaleString();

  return (
    <Box maxW="800px" mx="auto" mt={10}>
      <Flex align="center" mb={4}>
        <Avatar size="sm" name={username} />
        <Text fontWeight="bold" ml={2}>{username}</Text>
        <Text fontSize="sm" color="gray.500" ml={2}>{date}</Text>
      </Flex>
      <Text fontSize="2xl" fontWeight="bold" mb={4}>{title}</Text>
      <Box
        className="ql-editor"
        dangerouslySetInnerHTML={{ __html: content }}
      />
      {currentUser === username && (
        <Button mt={4} onClick={() => navigate(`/blog/edit/${id}`)}>
          Edit
        </Button>
      )}
    </Box>
  );
};

export default BlogView;
