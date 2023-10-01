const colors = require("tailwindcss/colors");
import preset from "./vendor/filament/support/tailwind.config.preset";

module.exports = {
    presets: [preset],
    darkMode: "class",
    content: [
        "./app/Filament/**/*.php",
        "./resources/views/filament/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.indigo,
                success: colors.green,
                warning: colors.yellow,
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
