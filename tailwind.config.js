module.exports = {
    mode: 'jit',
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      fontFamily: {
        'code': ['"Source Code Pro"', 'monospace']
      },
      extend: {
        colors: {
            'blue': '#0f0f23',
            'gray': '#cccccc',
            'green': '#00cc00',
            'light-green': '#99ff99',
            'light-gray': '#333340'
        },
        borderWidth: {
          'px': '1px',
        },
      },
    },
    plugins: [],
  }
