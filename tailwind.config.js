import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                galaxy: {
                    black: '#0a0a0a', // Deep space black
                    purple: '#8a2be2', // Bright electric purple
                    blue: '#483d8b', // Dark slate blue
                    starYellow: '#fffacd', // Pale yellow for stars
                    nebulaPink: '#ff69b4', // Pink for nebula accents
                }
            },
        },
    },

    plugins: [forms, typography],
};
