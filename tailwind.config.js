/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['index.php','dashboard.php','update.php'],
  theme: {
    extend: {
      fontFamily: {
        tajawal: ['Tajawal'],
      },keyframes: {
        lompat: {
          '0%, 100%': { transform: 'translateY(-5%)'},
          '50%': { transform: 'none'},
        }
      },
      animation: {
        'lompat': 'lompat 1s ease-in-out infinite',
        'spin-slow': 'spin 3s linear infinite',
      },
    },
  },
  plugins: [],
}

