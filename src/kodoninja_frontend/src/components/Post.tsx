// src/components/Post.tsx
import {
  Box,
  Flex,
  Avatar,
  Text,
  IconButton,
  HStack,
  Input,
  Button,
  Image,
  Grid,
  AspectRatio,
} from '@chakra-ui/react';
import {
  DeleteIcon,
  EditIcon,
  HamburgerIcon,
  ChatIcon,
  ShareIcon,
  StarIcon,
  AttachmentIcon,
} from '@chakra-ui/icons';
import React, { useState } from 'react';
import { Menu, MenuButton, MenuList, MenuItem } from '@chakra-ui/react';

interface PostProps {
  postId: number;
  username: string;
  timestamp: number;
  content: string;
  mediaUrls: string[];
  likes: number;
  comments: any[];
  onDelete: () => void;
  onEdit: () => void;
}

const Post: React.FC<PostProps> = ({
  postId,
  username,
  timestamp,
  content,
  mediaUrls,
  likes,
  comments,
  onDelete,
  onEdit,
}) => {
  const [isLiked, setIsLiked] = useState(false);
  const [likeCount, setLikeCount] = useState(likes);
  const [commentText, setCommentText] = useState('');
  const [localComments, setLocalComments] = useState<any[]>(comments);
  const [showComments, setShowComments] = useState(false);

  const handleLike = () => {
    setIsLiked(!isLiked);
    setLikeCount(isLiked ? likeCount - 1 : likeCount + 1);
  };

  const handleCommentSubmit = () => {
    if (commentText.trim()) {
      const newComment = [
        localComments.length + 1, // commentId
        username, // username
        commentText, // comment text
        [], // mediaUrls
        0, // likes
        [], // replies
      ];
      setLocalComments([...localComments, newComment]);
      setCommentText('');
    }
  };

  return (
    <Box p={4} borderWidth="1px" borderRadius="md" bg="white" boxShadow="sm" mb={4}>
      <Flex justify="space-between" align="center" mb={3}>
        <HStack spacing={3}>
          <Avatar size="sm" name={username} />
          <Box>
            <Text fontWeight="bold">{username}</Text>
            <Text fontSize="sm" color="gray.500">
              {new Date(timestamp / 1000000).toLocaleString()}
            </Text>
          </Box>
        </HStack>
        <Menu>
          <MenuButton as={IconButton} icon={<HamburgerIcon />} variant="ghost" />
          <MenuList>
            <MenuItem onClick={onEdit}>Edit</MenuItem>
            <MenuItem onClick={onDelete} color="red.500">
              Delete
            </MenuItem>
          </MenuList>
        </Menu>
      </Flex>
      <Text mb={3}>{content}</Text>
      {mediaUrls.length > 0 && (
        <Grid templateColumns="repeat(auto-fill, minmax(150px, 1fr))" gap={3} mb={3}>
          {mediaUrls.map((url, index) => {
            const isVideo = url.endsWith('.mp4') || url.endsWith('.webm');
            return isVideo ? (
              <AspectRatio key={index} ratio={16 / 9} maxW="200px">
                <video src={url} controls style={{ borderRadius: '8px' }} />
              </AspectRatio>
            ) : (
              <Image
                key={index}
                src={url}
                alt={`Media ${index}`}
                maxW="200px"
                borderRadius="md"
                objectFit="cover"
              />
            );
          })}
        </Grid>
      )}
      <HStack spacing={4} mb={3}>
        <HStack>
          <IconButton
            icon={<StarIcon />}
            colorScheme={isLiked ? 'yellow' : 'gray'}
            variant="ghost"
            aria-label="Like post"
            onClick={handleLike}
          />
          <Text fontSize="sm">{likeCount} Likes</Text>
        </HStack>
        <HStack>
          <IconButton
            icon={<ChatIcon />}
            variant="ghost"
            aria-label="View comments"
            onClick={() => setShowComments(!showComments)}
          />
          <Text fontSize="sm">{localComments.length} Comments</Text>
        </HStack>
        <IconButton icon={<ShareIcon />} variant="ghost" aria-label="Share post" />
      </HStack>
      {showComments && (
        <Box mt={3}>
          {localComments.length > 0 ? (
            localComments.map(([commentId, commentUsername, commentText, commentMediaUrls, commentLikes, replies]) => (
              <Box key={commentId} pl={4} borderLeft="2px solid" borderColor="gray.200" mb={3}>
                <HStack spacing={2} mb={1}>
                  <Avatar size="xs" name={commentUsername} />
                  <Text fontWeight="bold" fontSize="sm">{commentUsername}</Text>
                </HStack>
                <Text fontSize="sm" ml={6}>{commentText}</Text>
                {commentMediaUrls.length > 0 && (
                  <HStack mt={2} ml={6}>
                    {commentMediaUrls.map((url: string, index: number) => (
                      <Image
                        key={index}
                        src={url}
                        alt={`Comment media ${index}`}
                        maxW="100px"
                        borderRadius="md"
                      />
                    ))}
                  </HStack>
                )}
              </Box>
            ))
          ) : (
            <Text fontSize="sm" color="gray.500" ml={4}>
              No comments yet.
            </Text>
          )}
          <HStack mt={3}>
            <Input
              placeholder="Add a comment..."
              value={commentText}
              onChange={(e) => setCommentText(e.target.value)}
              size="sm"
            />
            <IconButton
              icon={<AttachmentIcon />}
              variant="ghost"
              aria-label="Attach media"
              size="sm"
            />
            <Button size="sm" onClick={handleCommentSubmit}>
              Post
            </Button>
          </HStack>
        </Box>
      )}
    </Box>
  );
};

export default Post;