module.exports = {
    mode: 'jit',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      colors: {
          'blue': '#0f0f23',
          'gray': '#cccccc',
          'green': '#00cc00',
          'light-green': '#99ff99',
      },
      fontFamily: {
        'code': ['"Source Code Pro"', 'monospace']
      },
      extend: {},
    },
    plugins: [],
  }
