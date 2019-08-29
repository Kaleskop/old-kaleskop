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
     "kaleskop-gold": {
      "200": '#ffe6be',
      "400": '#ffd694',
      default: '#fbc56d',
      "600": '#dca244',
      "800": '#ba8022',
     },
     "kaleskop-green": {
      "200": '#a9d7cd',
      "400": '#72c1ad',
      default: '#47a28b',
      "600": '#2d8e76',
      "800": '#147960'
     },
     "kaleskop-blue": {
      "200": '#abc2e0',
      "400": '#7899c4',
      default: '#4f76ac',
      "600": '#365d90',
      "800": '#1e477b'
     }
    },
    height: {
     '70-screen': '70vh'
    }
  }
 },
 variants: {},
 plugins: []
}
