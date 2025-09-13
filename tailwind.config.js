/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./app/Views/**/*.php",
    "./public/**/*.html" // Recherchez les classes Tailwind dans ces fichiers
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
