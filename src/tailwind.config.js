module.exports = {
  content: [
    "./App/views/**/*.{html,js,php}", // Scans everything in App/views directory and its subdirectories
    "./public/**/*.{html,js,php}", // Scans public directory
    "./../public_html/**/*.{html,js,php}", // Scans public_html for deployment
  ],
  theme: {
    extend: {},
  },
  daisyui: {
    themes: ["night"],
  },
  plugins: [require("daisyui")],
};

// npx tailwindcss -i ./../public_html/css/input.css -o ./../public_html/css/style.css --minify
