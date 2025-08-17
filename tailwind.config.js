/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  safelist: [
    'justify-start',
    'justify-end',
    'bg-yellow-300',
    'bg-green-300',
    'rounded-br-none',
    'rounded-bl-none',
    'bg-[#021908]',
    'bg-[#F9FAF8]',
    'bg-[#FFFFFF]',
    'bg-[#BBCB2F]',
    'text-[#021908]',
    'text-[#02190888]',
    'text-[#BBCB2F]',
    'text-[#FEFA95]'
  ],
  theme: {
    extend: {},
  },
  plugins: [],
};
