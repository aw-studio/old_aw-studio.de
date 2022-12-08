module.exports = {
    content: ["./resources/**/*.{js,jsx,ts,tsx,vue,blade.php}"],
    darkMode: false, // or 'media' or 'class'
    theme: {
        fontFamily: {
            sans: ["Calibre", "sans-serif"],
        },
        fontSize: {
            xs: ["12px", "14px"],
            sm: ["16px", "22px"],
            base: ["18px", "26px"],
            lg: ["20px", "28px"],
            xl: ["22px", "28px"],
            "2xl": ["30px", "38px"],
            "3xl": ["42px", "48px"],
            "4xl": ["54px", "60px"],
            "5xl": ["68px", "72px"],
        },
        fontWeight: {
            normal: 400,
            semibold: 600,
        },
        colors: {
            black: "#161616",
            white: "#ffffff",
            gray: "#cccccc",
        },
        container: {
            center: true,
            padding: {
                DEFAULT: "24px",
                md: "48px",
            },
        },
        screens: {
            sm: "640px",
            md: "768px",
            lg: "1024px",
            xl: "1280px",
            "2xl": "1280px",
        },
        dropShadow: {
            "3xl": "0 35px 35px rgba(0, 0, 0, 0.25)",
            "4xl": [
                "0 35px 35px rgba(0, 0, 0, 0.25)",
                "0 45px 65px rgba(0, 0, 0, 0.15)",
            ],
        },
        extend: {
            dropShadow: {
                "2xl": "0 0 40px rgba(0, 0, 0, 0.18)",
                "3xl": "0 0 80px rgba(0, 0, 0, 0.33)",
            },
            scale: {
                105: "1.05",
            },
            animation: {
                point: "point 1s linear infinite",
                "point-fast": "point 0.5s linear infinite",
            },
            keyframes: {
                point: {
                    "0%, 100%": { transform: "translateX(-2px)" },
                    "50%": { transform: "translateX(2px)" },
                },
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
