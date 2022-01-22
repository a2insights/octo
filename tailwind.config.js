const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    safelist: [
        "sm:max-w-sm",
        "sm:max-w-md",
        "sm:max-w-lg",
        "sm:max-w-xl",
        "sm:max-w-2xl",
        "sm:max-w-3xl",
        "sm:max-w-4xl",
        "sm:max-w-5xl",
        "sm:max-w-6xl",
        "sm:max-w-7xl",
        "md:max-w-lg",
        "md:max-w-xl",
        "lg:max-w-2xl",
        "lg:max-w-3xl",
        "xl:max-w-4xl",
        "xl:max-w-5xl",
        "2xl:max-w-6xl",
        "2xl:max-w-7xl'",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
