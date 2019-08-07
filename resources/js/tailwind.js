const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
 theme: {
  extend: {
   fontFamily: {
    serif: [
     "Tiempos",
     ...defaultTheme.fontFamily.serif
    ],
    brand: [
     "Alegreya Sans",
     ...defaultTheme.fontFamily.sans
    ]
   }
  }
 },
 variants: {},
 plugins: []
}
