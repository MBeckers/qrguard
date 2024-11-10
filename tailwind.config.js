/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'media', // or 'media'
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './app/Http/Livewire/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        invalid: '#D84141',  // Custom blue color
        primary: '#4778F5'
      }
    },
  },
  plugins: [],
}

