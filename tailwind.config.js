/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './resources/**/*.php',  // Ini akan mencakup semua file Blade
    ],
  theme: {
    extend: {},
  },
  plugins: [],
}

