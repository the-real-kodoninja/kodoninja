// src/pages/Login.tsx
import { Box, Button, FormControl, FormLabel, Input, Text, VStack } from '@chakra-ui/react';
import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { kodoninja } from '../utils/actor'; // Use the new actor

const Login = () => {
  const [username, setUsername] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const navigate = useNavigate();

  const handleLogin = async () => {
    try {
      const isLoggedIn = await kodoninja.login(username, password);
      if (isLoggedIn) {
        localStorage.setItem('username', username);
        navigate('/home');
      } else {
        setError('Invalid username or password');
      }
    } catch (err) {
      setError('Error logging in');
      console.error(err);
    }
  };

  const handleRegister = async () => {
    try {
      const success = await kodoninja.register(username, password);
      if (success) {
        setError('Registration successful! Please log in.');
      } else {
        setError('Username already exists');
      }
    } catch (err) {
      setError('Error registering');
      console.error(err);
    }
  };

  return (
    <Box maxW="400px" mx="auto" mt={10}>
      <VStack spacing={4}>
        <Text fontSize="2xl">Login to KodoNinja</Text>
        <FormControl>
          <FormLabel>Username</FormLabel>
          <Input
            value={username}
            onChange={(e) => setUsername(e.target.value)}
            placeholder="@kodoninja.kodoninja.social"
          />
        </FormControl>
        <FormControl>
          <FormLabel>Password</FormLabel>
          <Input
            type="password"
            value={password}
            onChange={(e) => setPassword(e.target.value)}
          />
        </FormControl>
        {error && <Text color="red.500">{error}</Text>}
        <Button onClick={handleLogin} bg="brand.darkRed" color="brand.white">
          Login
        </Button>
        <Button onClick={handleRegister} variant="outline" colorScheme="whiteAlpha">
          Register
        </Button>
      </VStack>
    </Box>
  );
};

export default Login;