import preset from "../../../../vendor/filament/filament/tailwind.config.preset";

export default {
    presets: [preset],
    content: [
        "./app/Filament/Clusters/Settings/**/*.php",
        "./resources/views/filament/clusters/settings/**/*.blade.php",
        "./vendor/filament/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/views/filament/**/*.blade.php",
        "./resources/views/*.blade.php",
        "./resources/views/tables/columns/*.blade.php",
        "./resources/views/components/*.blade.php",
        "./resources/views/filament/widgets/*.blade.php",
        "./resources/views/filament/resources/**/pages/*.blade.php",
        "./vendor/vendemy/learning/resources/views/**/*.blade.php",
        "./vendor/vendemy/learning/resources/views/**/**/*.blade.php",
    ],
};