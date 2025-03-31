// src/components/Post.tsx
import { Box, Flex, Avatar, Text, IconButton, HStack, Input, Button, Image, Grid, AspectRatio } from '@chakra-ui/react';
import { DeleteIcon, EditIcon, HamburgerIcon, ChatIcon, ShareIcon, ThumbsUpIcon, AttachmentIcon } from '@chakra-ui/icons';
import React, { useState } from 'react';
import { Menu, MenuButton, MenuList, MenuItem } from '@chakra-ui/react';
import { kodoninja } from '../utils/actor';

type PostProps = {
  postId: number;
  username: string;
  timestamp: number;
  content: string;
  mediaUrls: string[];
  likes: number;
  comments: [number, string, string, string[], number, [string, string, string[]][]][];
  onDelete?: () => void;
  onEdit?: () => void;
};

const Post: React.FC<PostProps> = ({ postId, username, timestamp, content, mediaUrls, likes, comments, onDelete, onEdit }) => {
  const [newComment, setNewComment] = useState('');
  const [commentMediaFiles, setCommentMediaFiles] = useState<File[]>([]);
  const [replyInputs, setReplyInputs] = useState<{ [key: number]: string }>({});
  const [replyMediaFiles, setReplyMediaFiles] = useState<{ [key: number]: File[] }>({});
  const currentUser = localStorage.getItem('username') || 'Anonymous';

  const handleLike = async () => {
    await kodoninja.likePost(postId, currentUser);
    window.location.reload();
  };

  const handleCommentMediaChange = (e: React.ChangeEvent<HTMLInputElement>) => {
    if (e.target.files) {
      const files = Array.from(e.target.files).slice(0, 4);
      setCommentMediaFiles(files);
    }
  };

  const handleAddComment = async () => {
    if (newComment.trim() || commentMediaFiles.length > 0) {
      const mediaUrls = commentMediaFiles.map(file => URL.createObjectURL(file));
      await kodoninja.addComment(postId, currentUser, newComment, mediaUrls);
      setNewComment('');
      setCommentMediaFiles([]);
      window.location.reload();
    }
  };

  const handleLikeComment = async (commentId: number) => {
    await kodoninja.likeComment(postId, commentId, currentUser);
    window.location.reload();
  };

  const handleReplyMediaChange = (commentId: number, e: React.ChangeEvent<HTMLInputElement>) => {
    if (e.target.files) {
      const files = Array.from(e.target.files).slice(0, 4);
      setReplyMediaFiles(prev => ({ ...prev, [commentId]: files }));
    }
  };

  const handleReply = async (commentId: number) => {
    const reply = replyInputs[commentId] || '';
    const mediaFiles = replyMediaFiles[commentId] || [];
    if (reply.trim() || mediaFiles.length > 0) {
      const mediaUrls = mediaFiles.map(file => URL.createObjectURL(file));
      await kodoninja.replyToComment(postId, commentId, currentUser, reply, mediaUrls);
      setReplyInputs(prev => ({ ...prev, [commentId]: '' }));
      setReplyMediaFiles(prev => ({ ...prev, [commentId]: [] }));
      window.location.reload();
    }
  };

  const handleShare = () => {
    navigator.clipboard.writeText(window.location.href + `/post/${postId}`);
    alert('Link copied to clipboard!');
  };

  const timeAgo = new Date(timestamp / 1000000).toLocaleString();

  const isYouTubeLink = (url: string) => url.includes('youtube.com') || url.includes('youtu.be');
  const isXLink = (url: string) => url.includes('x.com') || url.includes('twitter.com');
  const isFacebookLink = (url: string) => url.includes('facebook.com');

  const renderMedia = (url: string) => {
    if (isYouTubeLink(url)) {
      const videoId = url.split('v=')[1]?.split('&')[0] || url.split('youtu.be/')[1]?.split('?')[0];
      return (
        <AspectRatio ratio={16 / 9}>
          <iframe
            src={`https://www.youtube.com/embed/${videoId}`}
            title="YouTube video"
            allowFullScreen
          />
        </AspectRatio>
      );
    } else if (isXLink(url)) {
      return <Text color="blue.500">{url}</Text>;
    } else if (isFacebookLink(url)) {
      return <Text color="blue.500">{url}</Text>;
    } else if (url.endsWith('.mp4') || url.endsWith('.webm')) {
      return (
        <video controls style={{ maxWidth: '100%' }}>
          <source src={url} type="video/mp4" />
        </video>
      );
    } else if (url.includes('giphy.com') || url.includes('.gif')) {
      return <Image src={url} alt="GIF" maxH="200px" objectFit="cover" />;
    } else {
      return <Image src={url} alt="Media" maxH="200px" objectFit="cover" />;
    }
  };

  const displayedMedia = mediaUrls.slice(0, 4);
  const extraMediaCount = mediaUrls.length > 4 ? mediaUrls.length - 4 : 0;

  return (
    <Box p={4} borderWidth="1px" borderRadius="md" mb={4}>
      <Flex justify="space-between" align="center">
        <HStack spacing={3}>
          <Avatar size="sm" name={username} />
          <Text fontWeight="bold">{username}</Text>
          <Text fontSize="sm" color="gray.500">{timeAgo}</Text>
        </HStack>
        <Menu>
          <MenuButton as={IconButton} icon={<HamburgerIcon />} variant="ghost" />
          <MenuList>
            <MenuItem onClick={onEdit}>Edit</MenuItem>
            <MenuItem onClick={onDelete}>Delete</MenuItem>
            <MenuItem>Hide</MenuItem>
          </MenuList>
        </Menu>
      </Flex>
      <Text mt={2}>{content}</Text>
      {mediaUrls.length > 0 && (
        <Grid templateColumns="repeat(2, 1fr)" gap={2} mt={2}>
          {displayedMedia.map((url, index) => (
            <Box key={index} position="relative">
              {renderMedia(url)}
              {index === 3 && extraMediaCount > 0 && (
                <Flex
                  position="absolute"
                  top="0"
                  left="0"
                  right="0"
                  bottom="0"
                  align="center"
                  justify="center"
                  bg="rgba(0,0,0,0.5)"
                  color="white"
                  fontSize="xl"
                >
                  +{extraMediaCount}
                </Flex>
              )}
            </Box>
          ))}
        </Grid>
      )}
      <HStack mt={2} spacing={4}>
        <HStack>
          <IconButton icon={<ThumbsUpIcon />} onClick={handleLike} aria-label="Like" variant="ghost" />
          <Text>{likes}</Text>
        </HStack>
        <HStack>
          <IconButton icon={<ChatIcon />} aria-label="Comment" variant="ghost" />
          <Text>{comments.length}</Text>
        </HStack>
        <IconButton icon={<ShareIcon />} onClick={handleShare} aria-label="Share" variant="ghost" />
      </HStack>
      <Flex mt={2} align="center">
        <Input
          placeholder="Add a comment..."
          value={newComment}
          onChange={(e) => setNewComment(e.target.value)}
          mr={2}
        />
        <IconButton
          as="label"
          htmlFor={`comment-media-${postId}`}
          icon={<AttachmentIcon />}
          aria-label="Upload media"
          variant="outline"
          mr={2}
        />
        <Input
          id={`comment-media-${postId}`}
          type="file"
          accept="image/*,video/*"
          multiple
          onChange={handleCommentMediaChange}
          display="none"
        />
        <Button onClick={handleAddComment} bg="brand.darkRed" color="brand.white">
          Post
        </Button>
      </Flex>
      {commentMediaFiles.length > 0 && (
        <Text fontSize="sm" color="gray.500" mt={1}>
          {commentMediaFiles.length} file(s) selected
        </Text>
      )}
      {comments.length > 0 && (
        <Box mt={2}>
          {comments.map(([commentId, commentUsername, comment, commentMediaUrls, commentLikes, replies], index) => (
            <Box key={index} ml={4} mt={2}>
              <HStack>
                <Avatar size="xs" name={commentUsername} />
                <Text fontWeight="bold">{commentUsername}</Text>
                <Text>{comment}</Text>
              </HStack>
              {commentMediaUrls.length > 0 && (
                <Grid templateColumns="repeat(2, 1fr)" gap={2} mt={1} ml={8}>
                  {commentMediaUrls.map((url, idx) => (
                    <Box key={idx}>{renderMedia(url)}</Box>
                  ))}
                </Grid>
              )}
              <HStack ml={8} spacing={2}>
                <IconButton
                  icon={<ThumbsUpIcon />}
                  onClick={() => handleLikeComment(commentId)}
                  aria-label="Like comment"
                  variant="ghost"
                  size="sm"
                />
                <Text>{commentLikes}</Text>
                <Button size="sm" onClick={() => setReplyInputs(prev => ({ ...prev, [commentId]: prev[commentId] || '' }))}>
                  Reply
                </Button>
              </HStack>
              {replyInputs[commentId] !== undefined && (
                <Flex ml={8} mt={2} align="center">
                  <Input
                    placeholder="Add a reply..."
                    value={replyInputs[commentId]}
                    onChange={(e) => setReplyInputs(prev => ({ ...prev, [commentId]: e.target.value }))}
                    mr={2}
                  />
                  <IconButton
                    as="label"
                    htmlFor={`reply-media-${commentId}`}
                    icon={<AttachmentIcon />}
                    aria-label="Upload media"
                    variant="outline"
                    mr={2}
                  />
                  <Input
                    id={`reply-media-${commentId}`}
                    type="file"
                    accept="image/*,video/*"
                    multiple
                    onChange={(e) => handleReplyMediaChange(commentId, e)}
                    display="none"
                  />
                  <Button onClick={() => handleReply(commentId)} bg="brand.darkRed" color="brand.white" size="sm">
                    Reply
                  </Button>
                </Flex>
              )}
              {replyMediaFiles[commentId]?.length > 0 && (
                <Text fontSize="sm" color="gray.500" mt={1} ml={8}>
                  {replyMediaFiles[commentId].length} file(s) selected
                </Text>
              )}
              {replies.length > 0 && (
                <Box ml={12}>
                  {replies.map(([replyUsername, reply, replyMediaUrls], replyIndex) => (
                    <Box key={replyIndex} mt={1}>
                      <HStack>
                        <Avatar size="xs" name={replyUsername} />
                        <Text fontWeight="bold">{replyUsername}</Text>
                        <Text>{reply}</Text>
                      </HStack>
                      {replyMediaUrls.length > 0 && (
                        <Grid templateColumns="repeat(2, 1fr)" gap={2} mt={1} ml={4}>
                          {replyMediaUrls.map((url, idx) => (
                            <Box key={idx}>{renderMedia(url)}</Box>
                          ))}
                        </Grid>
                      )}
                    </Box>
                  ))}
                </Box>
              )}
            </Box>
          ))}
        </Box>
      )}
    </Box>
  );
};

export default Post;