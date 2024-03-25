/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    theme: {
        extend: {
            colors: {
                primaryColor: "#04CFC9",
                secondaryColor: "#EEFCFD",
                backgroundColor: "#EDFBFA"
            }
        }
    },
    plugins: []
};
