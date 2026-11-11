/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php", "./resources/**/*.js"],
    theme: {
        extend: {
            colors: {
                paper: "#ffffff",
                ink: "#0E1726",
                line: "#E3E8F0",
                mist: "#F5F8FC",
                mint: "#18E3B0",
                brand: {
                    DEFAULT: "#0068FD",
                    dark: "#0050D1",
                    soft: "#EAF2FF",
                },
            },
            fontFamily: {
                sans: [
                    '"IBM Plex Sans Arabic"',
                    "ui-sans-serif",
                    "system-ui",
                    "sans-serif",
                ],
                display: [
                    '"Readex Pro"',
                    '"IBM Plex Sans Arabic"',
                    "ui-sans-serif",
                    "sans-serif",
                ],
            },
        },
    },
    plugins: [],
};
