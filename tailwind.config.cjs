const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js'
    ],
    theme: {
        fontFamily: {
            sans: ["Inter", ...defaultTheme.fontFamily.sans],
            mono: ["JetBrains Mono", ...defaultTheme.fontFamily.mono]
        },
        extend: {
            colors: {
                // …

                // Legacy colors
                transparent: 'transparent',
                current: 'currentColor',
                spatie: '#197593',
                wordpress: '#007fa2',
                midnight: '#1E0063',
                midnightDark: '#13052B',
            },
        },
    },
};
