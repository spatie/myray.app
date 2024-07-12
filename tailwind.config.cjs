const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js'
    ],
    theme: {
        fontFamily: {
            sans: ['PT Root UI', ...defaultTheme.fontFamily.sans],
            mono: ['JetBrains Mono', ...defaultTheme.fontFamily.mono],
            display: ['Hanken Grotesk', ...defaultTheme.fontFamily.sans]
        },
        extend: {
            boxShadow: {
                'top-white': 'inset 0px 1px 0px rgba(255, 255, 255, 0.2)',
                'large-drop': '0px 308px 86px 0px rgba(0, 0, 0, 0.00), 0px 197px 79px 0px rgba(0, 0, 0, 0.02), 0px 111px 67px 0px rgba(0, 0, 0, 0.06), 0px 49px 49px 0px rgba(0, 0, 0, 0.11), 0px 12px 27px 0px rgba(0, 0, 0, 0.13)',
                'small-drop': '0px 10px 15px -3px rgba(0, 0, 0, 0.10), 0px 4px 6px -2px rgba(0, 0, 0, 0.05)'
            },
            colors: {

                'bleak-purple': {
                    'extra-light': '#A998D3',
                    'light': '#5A4581',
                    'DEFAULT': '#3B275F',
                    'dark': '#29174B'
                },

                'bright-purple': {
                    'light': '#4D00C9',
                    'DEFAULT': '#36107A'
                },

                'bright-orange': {
                    'light': '#FF5001',
                    'DEFAULT': '#FF3500'
                },

                'midnight': {
                    'extra-light': '#36107A',
                    'light': '#1E0842',
                    'DEFAULT': '#170636',
                    'dark': '#13052B'
                },

                'orange': {
                    'DEFAULT': '#FF6C00'
                },

                'neutrals': {
                    'white-20': 'rgba(255,255,255,0.2)'
                },

                // Legacy colors
                transparent: 'transparent',
                current: 'currentColor',
                spatie: '#197593',
                wordpress: '#007fa2',
                // midnight: '#1E0063',
                // midnightDark: '#13052B',
            },
        },
    },
};
