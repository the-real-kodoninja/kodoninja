// src/theme.ts
import { extendTheme } from '@chakra-ui/react';

const theme = extendTheme({
  config: {
    initialColorMode: 'dark', // Default to dark mode
    useSystemColorMode: false,
  },
  colors: {
    brand: {
      darkRed: '#8B0000', // Dark red for accents
      white: '#FFFFFF', // White for text/icons
      onyx: '#1C2526', // Onyx for backgrounds
    },
  },
  fonts: {
    heading: `'Inter', sans-serif`,
    body: `'Inter', sans-serif`,
  },
  styles: {
    global: (props) => ({
      body: {
        bg: props.colorMode === 'dark' ? 'brand.onyx' : 'white',
        color: props.colorMode === 'dark' ? 'brand.white' : 'gray.800',
      },
    }),
  },
});

export default theme;