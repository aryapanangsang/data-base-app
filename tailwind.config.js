/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    './resources/views/filament/**/*.blade.php',
    './resources/views/Livewire/**/*.blade.php',
    './vendor/filament/**/*.blade.php',
    
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

