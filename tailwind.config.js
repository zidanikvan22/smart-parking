import plugin from 'tailwindcss/plugin'

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        biru_tua: "#B3EBF2",
        biru_muda: "#00CCFF",
        hijau: "#376A3F",
        birumuda_login: "#DCF8FF",
        birutua_login: "#89E4FC",
        birutua_loginhover: "#6EB4C6",
      },
      fontFamily: {
        poppins: ["Poppins", "sans-serif"],
        londrina: ['"Londrina Shadow"', 'cursive'],
      },
      animation: {
        fadeIn: 'fadeIn 0.3s ease-in-out',
        zoomIn: 'zoomIn 0.3s ease-in-out both',
        'bounce-slow': 'bounceSlow 1s ease-in-out infinite',
      },
      keyframes: {
        fadeIn: {
          '0%': { opacity: '0' },
          '100%': { opacity: '1' },
        },
        bounceSlow: {
          '0%, 100%': { transform: 'translateY(0)' },
          '50%': { transform: 'translateY(-10px)' },
        },
        zoomIn: {
          '0%': { transform: 'scale(0.95)', opacity: '0' },
          '100%': { transform: 'scale(1)', opacity: '1' },
        },
      },
    },
  },
  plugins: [
    require('daisyui'),
    require('flowbite/plugin'),
    plugin(function ({ addUtilities }) {
      addUtilities({
        '.text-outline': {
          color: 'transparent',
          '-webkit-text-stroke': '1px white',
          '-webkit-background-clip': 'text',
          'background-clip': 'text',
        },
      });
    }),
  ],
}
