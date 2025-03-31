// src/components/Layout.tsx
import { Box, Flex, IconButton, Input, Menu, MenuButton, MenuItem, MenuList, Text, useColorMode, Avatar, HStack } from '@chakra-ui/react';
import { HamburgerIcon, BellIcon, SearchIcon } from '@chakra-ui/icons';
import React from 'react';
import { Link } from 'react-router-dom';

const Layout: React.FC<{ children: React.ReactNode }> = ({ children }) => {
  const { colorMode, toggleColorMode } = useColorMode();
  const username = localStorage.getItem('username') || 'Guest';

  return (
    <Box minH="100vh">
      <Flex as="header" p={4} bg="brand.darkRed" color="brand.white" justify="space-between" align="center">
        <Text fontFamily="'NinjaNaruto', sans-serif" fontSize="2xl" fontWeight="bold">
          kodoninja
        </Text>
        <Input
          placeholder="Search..."
          maxW="300px"
          bg={colorMode === 'dark' ? 'brand.onyx' : 'gray.100'}
          border="none"
          borderRadius="md"
          _focus={{ borderColor: 'brand.white' }}
        />
        <HStack spacing={4}>
          <Menu>
            <MenuButton as={IconButton} icon={<BellIcon />} variant="ghost" color="brand.white" />
            <MenuList bg={colorMode === 'dark' ? 'brand.onyx' : 'white'}>
              <MenuItem>No new notifications</MenuItem>
            </MenuList>
          </Menu>
          <Link to={`/user/${username}`}>
            <Avatar size="sm" name={username} bg="gray.500" />
          </Link>
          <Menu>
            <MenuButton as={IconButton} icon={<HamburgerIcon />} variant="ghost" color="brand.white" />
            <MenuList bg={colorMode === 'dark' ? 'brand.onyx' : 'white'}>
              <MenuItem as={Link} to="/feed">Feed</MenuItem>
              <MenuItem as={Link} to="/home">Home</MenuItem>
              <MenuItem as={Link} to="/explore">Explore</MenuItem>
              <MenuItem as={Link} to="/settings">Settings</MenuItem>
              <MenuItem onClick={toggleColorMode}>
                {colorMode === 'light' ? 'Dark' : 'Light'} Mode
              </MenuItem>
              <MenuItem>Logout</MenuItem>
            </MenuList>
          </Menu>
        </HStack>
      </Flex>
      <Flex>
        <Box
          as="nav"
          w={{ base: '0', md: '200px' }}
          bg={colorMode === 'dark' ? 'brand.onyx' : 'gray.100'}
          p={4}
          display={{ base: 'none', md: 'block' }}
        >
          <Text fontWeight="bold">Menu</Text>
          <Link to="/feed"><Text mt={2}>Feed</Text></Link>
          <Link to="/home"><Text mt={2}>Home</Text></Link>
          <Link to="/explore"><Text mt={2}>Explore</Text></Link>
          <Link to="/blogs"><Text mt={2}>Blogs</Text></Link>
          <Link to="/goals"><Text mt={2}>Goals</Text></Link>
          <Link to="/forums"><Text mt={2}>Forums</Text></Link>
          <Link to={`/user/${username}`}><Text mt={2}>Profile</Text></Link>
        </Box>
        <Box flex="1" p={4}>
          {children}
        </Box>
      </Flex>
    </Box>
  );
};

export default Layout;