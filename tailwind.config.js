const colors = require('tailwindcss/colors');
const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    important: true,
    purge: [
             './resources/**/*.blade.php',
             './resources/**/*.js',
    ],
    theme: {
        fontFamily: {
            sans: ["Inter", ...defaultTheme.fontFamily.sans],
            mono: ["JetBrains Mono", ...defaultTheme.fontFamily.mono]
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            spatie: '#197593',
            wordpress: '#007fa2',

            black: "#1e0063",
            white: colors.white,
            gray: colors.coolGray,
            red: colors.red,
            yellow: colors.amber,
            green: colors.green,
            blue: colors.blue,
            purple: colors.purple,
            indigo: {
                100: "#efebff",
                200: "#c6b0f2",
                300: "#9e76e4",
                400: "#763bd7",
                500: "#4d00c9",
                600: "#3e02a1",
                700: "#2f0379",
                800: "#180051",
                900: "#160042",
            },
            orange: {
                100: "#fff0e8",
                200: "#ffc9ae",
                300: "#ffa374",
                400: "#ff7c3a",
                500: "#ff6c00",
                600: "#ff3500",
                700: "#cf2b00",
                800: "#9c2000",
                900: "#5c1300",
            },
        },
        extend: {
            minWidth: {
                8 : '2rem',
                10 : '2.5rem',
                12 : '3rem',
            },
            fontSize: {
                'px-xs': '10px',
                'px-sm': '12px',
                'px-base': '14px',
            },
            backgroundOpacity: {
                10 : '0.1',
                30 : '0.3'
            },
            gridTemplateColumns: {
                'auto-1fr' : 'auto 1fr',
            }
        },
    },
    variants: {
        extend: {
           translate: ['group-hover', 'active'],
           scale: ['group-hover'],
           zIndex: ['hover']
        },
    },
    plugins: [],
};
