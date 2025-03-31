// src/App.tsx
import { ChakraProvider } from '@chakra-ui/react';
import { BrowserRouter as Router, Routes, Route, Navigate } from 'react-router-dom';
import Layout from './components/Layout';
import theme from './theme';
import Feed from './pages/Feed';
import Home from './pages/Home';
import Explore from './pages/Explore';
import Blogs from './pages/Blogs';
import Goals from './pages/Goals';
import Forums from './pages/Forums';
import Settings from './pages/Settings';
import Login from './pages/Login';
import User from './pages/User';
import BlogCreate from './pages/BlogCreate';
import BlogView from './pages/BlogView';
import BlogEdit from './pages/BlogEdit';

const App = () => {
  const isLoggedIn = !!localStorage.getItem('username');

  return (
    <ChakraProvider theme={theme}>
      <Router>
        <Routes>
          <Route path="/login" element={<Login />} />
          <Route
            path="/*"
            element={
              isLoggedIn ? (
                <Layout>
                  <Routes>
                    <Route path="/feed" element={<Feed />} />
                    <Route path="/home" element={<Home />} />
                    <Route path="/explore" element={<Explore />} />
                    <Route path="/blogs" element={<Blogs />} />
                    <Route path="/blog/create" element={<BlogCreate />} />
                    <Route path="/blog/:blogId" element={<BlogView />} />
                    <Route path="/blog/edit/:blogId" element={<BlogEdit />} />
                    <Route path="/goals" element={<Goals />} />
                    <Route path="/forums" element={<Forums />} />
                    <Route path="/settings" element={<Settings />} />
                    <Route path="/user/:username" element={<User />} />
                    <Route path="/" element={<Home />} />
                  </Routes>
                </Layout>
              ) : (
                <Navigate to="/login" />
              )
            }
          />
        </Routes>
      </Router>
    </ChakraProvider>
  );
};

export default App;