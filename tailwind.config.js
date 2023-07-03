/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{php,html,js}"],
  plugins: [require("daisyui")],
  daisyui: {
    themes: ["retro", "dark"],
  },
};
