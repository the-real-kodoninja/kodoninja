// src/pages/BlogEdit.tsx
import { Box, Button, Input, Text, VStack } from '@chakra-ui/react';
import React, { useState, useEffect } from 'react';
import ReactQuill from 'react-quill';
import 'react-quill/dist/quill.snow.css';
import { useParams, useNavigate } from 'react-router-dom';
import { kodoninja } from '../utils/actor';

const BlogEdit = () => {
  const { blogId } = useParams<{ blogId: string }>();
  const [title, setTitle] = useState('');
  const [content, setContent] = useState('');
  const username = localStorage.getItem('username') || 'Anonymous';
  const navigate = useNavigate();

  useEffect(() => {
    const fetchBlog = async () => {
      if (blogId) {
        const blogData = await kodoninja.getBlog(Number(blogId));
        if (blogData) {
          const [_, __, blogTitle, blogContent, ___] = blogData;
          setTitle(blogTitle);
          setContent(blogContent);
        }
      }
    };
    fetchBlog();
  }, [blogId]);

  const handleSave = async () => {
    if (title.trim() && content.trim() && blogId) {
      const success = await kodoninja.updateBlog(Number(blogId), username, title, content);
      if (success) {
        navigate(`/blog/${blogId}`);
      } else {
        alert('Failed to update blog. You may not have permission.');
      }
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
        <Text fontSize="2xl">Edit Blog Post</Text>
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

export default BlogEdit;
