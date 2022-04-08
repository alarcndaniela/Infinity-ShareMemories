
const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    content: [],
    darkMode: 'media', // or 'media' or 'class'
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Montserrat', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'black' : '#282B35',
                'white-traslucid' : '#E7E8E9',
                'dark-gray': '#3D3F50',
                'light-gray': '#575B6D',
                'text-gray': '#8A8FA5',
                'cian': '#4AFFD4',
                'dark-cian' : '#46AF9D',
                'fucsia': '#E821B0',
            },
            minHeight: {
                '0': '0',
                '1/4': '25%',
                '1/2': '50%',
                '3/4': '75%',
                'full': '100%',
            }
        },
    },
};
