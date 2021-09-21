module.exports = {
  purge: [
    './storage/framework/views/*.php',
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
    gradientColorStops: theme => ({
      ...theme('colors'),
      'blue-1000': '#0e1c45',
      'blue-1100': '#09112b',
     }),
     backgroundColor: theme => ({
      ...theme('colors'),
      'blue-1000': '#0e1c45',
      'blue-1100': '#09112b',
     })
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
