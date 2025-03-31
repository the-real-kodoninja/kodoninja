// src/pages/Blogs.tsx
import { Box, Text, Button, Flex, Avatar } from '@chakra-ui/react';
import React, { useEffect, useState } from 'react';
import { Link, useNavigate } from 'react-router-dom';
import { kodoninja } from '../utils/actor';

const Blogs = () => {
  const [blogs, setBlogs] = useState<any[]>([]);
  const navigate = useNavigate();

  useEffect(() => {
    const fetchBlogs = async () => {
      const allBlogs = await kodoninja.getAllBlogs();
      setBlogs(allBlogs);
    };
    fetchBlogs();
  }, []);

  return (
    <Box>
      <Flex justify="space-between" align="center" mb={4}>
        <Text fontSize="2xl">Blogs</Text>
        <Button onClick={() => navigate('/blog/create')} bg="brand.darkRed" color="brand.white">
          Create Blog
        </Button>
      </Flex>
      {blogs.length > 0 ? (
        blogs.map(([id, username, title, _, timestamp]) => (
          <Link to={`/blog/${id}`} key={id}>
            <Box p={4} borderWidth="1px" borderRadius="md" mb={4}>
              <Flex align="center" mb={2}>
                <Avatar size="sm" name={username} />
                <Text fontWeight="bold" ml={2}>{username}</Text>
                <Text fontSize="sm" color="gray.500" ml={2}>
                  {new Date(Number(timestamp) / 1000000).toLocaleString()}
                </Text>
              </Flex>
              <Text fontSize="xl">{title}</Text>
            </Box>
          </Link>
        ))
      ) : (
        <Text>No blogs yet.</Text>
      )}
    </Box>
  );
};

export default Blogs;