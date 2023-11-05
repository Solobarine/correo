/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            xs: "100px",
            sm: "300px",
            md: "640px",
        },
        extend: {
            colors: {
                primary: "#3A8340",
                secondary: "#FF6B0C",
                accent: "#BBA570",
                text: "#333333",
                light: "#EEEEEE",
                background1: "#E5E5E5",
                background2: "#D1D1E0",
                neutral: "#C0C0C0",
                "action-pos": "#3322ff",
                "action-call": "#FFD700",
                "action-bad": "#D71C1C",
                danger: "#A81A0A",
            },
            fontFamily: {
                DEFAULT: "system-ui",
            },
            flexBasis: {
                menu: "150px",
            },
            width: {
                avatar: "40px",
                sm: "100%",
                x: "20em",
                xl: "30em",
                l: "40em",
            },
            height: {
                avatar: "40px",
            },
            spacing: {
                "minus-1/2": "-50%",
            },
            padding: {
                medium: "52px",
            },
        },
    },
    plugins: [],
};
