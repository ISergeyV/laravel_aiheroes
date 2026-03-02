/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    corePlugins: {
        preflight: false,
    },
    theme: {
        extend: {
            colors: {
                'accent': '#a3e635', // Match the lime-green accent
                'accent-hover': '#bef264',
                'surface': '#f8fafc',
                'border': '#e2e8f0',
                'text': '#0f172a',
                'text-light': '#64748b',
                'text-dark-bg': '#f8fafc',
                'bg-dark': '#020617',
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            spacing: {
                'xs': '0.5rem',
                'sm': '1rem',
                'md': '2rem',
                'lg': '4rem',
                'xl': '8rem',
            },
            borderRadius: {
                'md': '12px',
                'lg': '24px',
            },
            keyframes: {
                marquee: {
                    '0%': { transform: 'translateX(0%)' },
                    '100%': { transform: 'translateX(-50%)' },
                }
            },
            animation: {
                marquee: 'marquee 40s linear infinite',
            }
        },
    },
    plugins: [],
}
