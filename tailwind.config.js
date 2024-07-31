const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');
import preset from './vendor/filament/support/tailwind.config.preset';

module.exports = {
    darkMode: 'class',
    presets: [
        preset
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            typography: {
                DEFAULT: {
                    // Disable the <code> tag ::before and ::after
                    css: {
                        "code::before": {
                            content: "none"
                        },
                        "code::after": {
                            content: "none"
                        }
                    }
                }
            },
            colors: {
                'primary': {
                    DEFAULT: '#E44763',
                    50: '#FBE7EB',
                    100: '#F9D5DC',
                    200: '#F4B2BD',
                    300: '#EE8E9F',
                    400: '#E96B81',
                    500: '#E44763',
                    600: '#D41F3F',
                    700: '#A31831',
                    800: '#721122',
                    900: '#410A13',
                    950: '#29060C'
                },

                green: colors.emerald,
                yellow: colors.amber,
                purple: colors.violet,

                danger: colors.rose,
                success: colors.green,
                warning: colors.yellow,

                current: 'currentColor',
            },
            brightness: {
                5: '.05',
                10: '.10',
                15: '.15',
                20: '.20',
                25: '.25',
                30: '.30',
                35: '.35',
                40: '.40',
                45: '.45'
            }
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.blade.php',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
        './storage/framework/views/*.php',
        // Filament files
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        // Wire-elements modal files
        './vendor/wire-elements/modal/src/ModalComponent.php',
        // filament-radio-button-field files
        "./vendor/suleymanozev/**/*.blade.php",
    ],
    safelist: [
        "sm:max-w-sm",
        "sm:max-w-md",
        "sm:max-w-lg",
        "sm:max-w-xl",
        "sm:max-w-2xl",
        "sm:max-w-3xl",
        "sm:max-w-4xl",
        "sm:max-w-5xl",
        "sm:max-w-6xl",
        "sm:max-w-7xl",
        "md:max-w-lg",
        "md:max-w-xl",
        "lg:max-w-2xl",
        "lg:max-w-3xl",
        "xl:max-w-4xl",
        "xl:max-w-5xl",
        "2xl:max-w-6xl",
        "2xl:max-w-7xl",
        "brightness-0",
        "brightness-5",
        "brightness-10",
        "brightness-15",
        "brightness-20",
        "brightness-25",
        "brightness-30",
        "brightness-35",
        "brightness-40",
        "brightness-45",
        "brightness-50",
        "brightness-75",
        "brightness-90",
        "brightness-95",
        "brightness-100",
        "brightness-105",
        "brightness-110",
        "brightness-125",
        "brightness-150",
        "brightness-200",
    ],
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
    ],
};
