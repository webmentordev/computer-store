import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "main-gray": "#F9FAFC"
            },
            screens: {
                "1470px": {
                    "max": "1470px"
                },
                "1270px": {
                    "max": "1270px"
                },
                "980px": {
                    "max": "980px"
                }
            }
        },
    },

    plugins: [forms],
};
