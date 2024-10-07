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
    ],
}
