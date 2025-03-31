// src/pages/BlogCreate.tsx
import { Box, Button, Input, Text, VStack } from '@chakra-ui/react';
import React, { useState } from 'react';
import ReactQuill from 'react-quill';
import 'react-quill/dist/quill.snow.css'; // Import Quill styles
import { useNavigate } from 'react-router-dom';
import { kodoninja } from '../utils/actor';

const BlogCreate = () => {
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const username = localStorage.getItem('username') || 'Anonymous';
  const navigate = useNavigate();

  const handleSave = async () => {
    if (title.trim() && content.trim()) {
      const blogId = await kodoninja.createBlog(username, title, content);
      navigate(`/blog/${blogId}`);
    }
  };

  const quillModules = {
    toolbar: [
      [{ 'header': [1, 2, false] }],
      ['bold', 'italic', 'underline', 'strike', 'blockquote'],
      [{'list': 'ordered'}, {'list': 'bullet'}],
      ['link', 'image', 'video'],
      ['emoji'],
      ['clean']
    ],
  };

  return (
    <Box maxW="800px" mx="auto" mt={10}>
      <VStack spacing={4}>
        <Text fontSize="2xl">Create a Blog Post</Text>
        <Input
          placeholder="Blog Title"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
        />
        <ReactQuill
          theme="snow"
          value={content}
          onChange={setContent}
          modules={quillModules}
          style={{ height: '400px', marginBottom: '50px' }}
        />
        <Button onClick={handleSave} bg="brand.darkRed" color="brand.white">
          Save
        </Button>
      </VStack>
    </Box>
  );
};

export default BlogCreate;
