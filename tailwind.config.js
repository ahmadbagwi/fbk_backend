const defaultTheme = require('tailwindcss/defaultTheme');
const plugin = require('tailwindcss/plugin');

module.exports = {
    purge: ['./storage/framework/views/*.php', './resources/views/**/*.blade.php', './resources/js/**/*.vue'],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
        borderColors: ["responsive", "hover", "focus", "group-hover"],
        borderWidth: ['responsive', 'hover', 'focus'],
        visibility: ["responsive", "group-hover", 'group-focus', 'active'],
        display: ["responsive", "group-hover", "group-focus", 'active'],
    },

    plugins: [
        require('@tailwindcss/ui'),
        plugin(function({ addBase, config }) {
            addBase({
              'ul': { 
                listStyleType: config('theme.listStyleType.disc'),
                padding: config('theme.padding.8'),
              },
              'ol': { 
                listStyleType: config('theme.listStyleType.decimal'),
                padding: config('theme.padding.8'),
              },
            })
          })
    ],
};
