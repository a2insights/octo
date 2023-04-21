const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
module.exports = {
    presets: [],
    content: [],
    safelist: [],
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
