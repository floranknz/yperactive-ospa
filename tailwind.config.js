/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./**/*.php", "./**/*.js"],
    theme: {
        extend: {},
        container: {
            center: true,
            screens: {
                sm: "640px",
                md: "768px",
                lg: "1024px",
                xl: "1140px",
            },
            padding: {
                DEFAULT: "24px",
            },
        },
        fontFamily: {
            body: ["Figtree", "Arial"],
            title: ["Bon Vivant", "Times New Roman"],
        },
        spacing: {
            0: "0px",
            4: "4px",
            8: "8px",
            12: "12px",
            16: "16px",
            24: "24px",
            32: "32px",
            40: "40px",
            48: "48px",
            56: "56px",
            64: "64px",
            72: "72px",
            80: "80px",
            88: "88px",
            96: "96px",
            112: "112px",
            128: "128px",
            144: "144px",
        },
        boxShadow: {
            sm: "0px 2px 3px 0px rgba(0,0,0,0.05)",
            md: "0px 4px 6px 0px rgba(0,0,0,0.07)",
            lg: "0px 10px 15px 0px rgba(0,0,0,0.1)",
            xl: "0px 20px 20px 0px rgba(0,0,0,0.1)",
        },
        colors: {
            "mineral-green": {
                100: "#bcd3ce",
                200: "#92b6ae",
                300: "#6b968d",
                400: "#517b73",
                500: "#3f625d",
                600: "#395551",
                700: "#2e413f",
                800: "#293836",
                900: "#243230",
            },
            "outer-space": {
                100: "#d4dbdf",
                200: "#b8c1c6",
                300: "#71838d",
                400: "#62727a",
                500: "#526068",
                600: "#434e55",
                700: "#343d42",
                800: "#212629",
                900: "#1b2024",
            },
            "soft-white": {
                50: "#ffffff",
                100: "#fcfcfb",
                200: "#f6f6f5",
                300: "#ededec",
                400: "#e1e1e0",
            },
            cherokee: {
                100: "#fff6e5",
                200: "#fff0d2",
                300: "#ffe7b9",
                400: "#ffe0a2",
                500: "#ffd88c",
                600: "#f2cc7f",
                700: "#e0bb72",
                800: "#caa966",
            },
            pure: {
                black: "#000000",
                white: "#ffffff",
            },
            ui: {
                error: "#FF8383",
            }
        },
    },
    plugins: [require("tailwind-animatecss")],
    safelist: [
        "py-40",
        "pr-12",
        "my-16",
        "transition-all",
        {
            pattern: /w-./,
            variants: ['sm', 'md'],
        },
        {
            pattern: /h-./
        },
        {
            pattern: /items-./,
        },
        {
            pattern: /justify-./,
        },
        {
            pattern: /aspect-./,
        }
        
    ]
};
