const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
module.exports = {
    presets: [require("./vendor/wireui/wireui/tailwind.config.js")],
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./vendor/a2insights/octo-core/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./vendor/wireui/wireui/resources/**/*.blade.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/View/**/*.php",
        "./vendor/laravel-views/**/*.php",
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
        "2xl:max-w-7xl",
        "grid",
        "bg-gradient-to-tl",
        "from-yellow-200",
        "to-orange-500",
        "rounded-full",
        "hover:from-orange-300",
        "hover:to-red-400",
        "transition-all",
        "duration-150",
        "delay-100",
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.indigo,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
    corePlugins: {
        flex: true,
        flexBasis: true,
    },
};
