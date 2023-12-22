/** @type {import('tailwindcss').Config} */
import preset from './vendor/filament/support/tailwind.config.preset'
const colors = require('tailwindcss/colors')
export default {
    // presets: [preset],
    content: [
         './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
  ],
  theme: {
      extend: {
          colors: {
              primary: colors.purple,
              secondary: colors.zinc,
              tertiary: colors.rose,
        }
    },
  },
  plugins: [],
}

