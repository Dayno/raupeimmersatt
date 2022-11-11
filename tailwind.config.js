/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{js,jsx,ts,tsx}", "./public/index.html"],
  theme: {
    extend: {
      colors: {
        primary: "#2A3132",
        secondary: "#B18767",
        default: "#CDCDC0",
        button: "#8EBAE5",
      },
      fontFamily: {
        inter: ["Inter", "sans-serif"],
      },
    },
    fontWeight: {
      extrathin: 100,
      thin: 200,
      light: 300,
      normal: 400,
      medium: 500,
      bold: 700,
      extrabold: 800,
      black: 900,
    },
    screens: {
      sm: "440px",
      // => @media (min-width: 440px) { ... }

      md: "547px",
      // => @media (min-width: 547px) { ... }

      lg: "768px",
      // => @media (min-width: 768px) { ... }

      xl: "1024px",
      // => @media (min-width: 1024px) { ... }

      "1xl": "1260px",
      // => @media (min-width: 1200px) { ... }

      "2xl": "1680px",
      // => @media (min-width: 1680px) { ... }
    },
  },
};
