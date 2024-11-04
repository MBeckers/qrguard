/** @type {import('tailwindcss').Config} */
export default {
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
      }
    },
  },
  plugins: [],
}

