const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
 theme: {
  extend: {
   fontFamily: {
    serif: [
     "Tiempos",
     ...defaultTheme.fontFamily.serif
    ],
    sans: [
     "Work Sans",
     ...defaultTheme.fontFamily.sans
    ],
    brand: [
     "Alegreya Sans",
     ...defaultTheme.fontFamily.sans
     ]
    },
    colors: {
     "kaleskop-green": {
      default: '#82a096'
     }
    }
  }
 },
 variants: {},
 plugins: []
}
