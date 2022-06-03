module.exports = {
  content: ["./views/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        primary: "#4ade80",
        secondary: "#A3DCAA",
      },
      fontFamily: {
        sans: ["Poppins", "arial", "sans"],
      },
    },
  },
  important: true,
  plugins: [require("@tailwindcss/forms")],
};
