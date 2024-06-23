/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        colors: {
            "main": "#2f365f",
            "secondary": "#5661b3",
            "third": "#191e38"
        }
    },
  },
  plugins: [],
}

