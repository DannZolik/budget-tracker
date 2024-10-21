import preset from './vendor/filament/support/tailwind.config.preset'

export default {
    presets: [preset],
    content: [
        './app/Filament/**/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        './resources/views/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './resources/views/filament/**/*.blade.php',
        './resources/views/filament/widgets/*.blade.php',
        './resources/views/tables/columns/*.blade.php',
        "./app/Filament/Clusters/Settings/**/*.php",
        "./resources/views/filament/clusters/settings/**/*.blade.php",
        "./resources/views/components/*.blade.php",
        "./resources/views/filament/resources/**/pages/*.blade.php",
        "./vendor/vendemy/learning/resources/views/**/*.blade.php",
        "./vendor/vendemy/learning/resources/views/**/**/*.blade.php",
        "./resources/views/errors/*.blade.php",
    ],
}
