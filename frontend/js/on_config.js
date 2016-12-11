// https://material.angularjs.org/latest/Theming/01_introduction
// https://material.angularjs.org/latest/Theming/02_declarative_syntax
// https://material.angularjs.org/latest/Theming/03_configuring_a_theme

function OnConfig($mdThemingProvider) {
    'ngInject';

    $mdThemingProvider.definePalette('psatPalette', {
        '50': '#ffebee',
        '100': '#ffcdd2',
        '200': '#ef9a9a',
        '300': '#e57373',
        '400': '#ef5350',
        '500': '#f44336',
        '600': '#e53935',
        '700': '#d32f2f',
        '800': '#c62828',
        '900': '#b71c1c',
        'A100': '#ff8a80',
        'A200': '#ff5252',
        'A400': '#ff1744',
        'A700': '#d50000',
        'contrastDefaultColor': 'light',    // whether, by default, text (contrast)
                                            // on this palette should be dark or light

        'contrastDarkColors': ['50', '100', //hues which contrast should be 'dark' by default
            '200', '300', '400', 'A100'],
        'contrastLightColors': undefined    // could also specify this if default was 'dark'
    });

    // Extend the red theme with a different color and make the contrast color black instead of white.
    // For example: raised button text will be black instead of white.
    var neonRedMap = $mdThemingProvider.extendPalette('red', {
        '500': '#ff0000',
        'contrastDefaultColor': 'dark'
    });

    // Register the new color palette map with the name <code>neonRed</code>
    $mdThemingProvider.definePalette('neonRed', neonRedMap);

    $mdThemingProvider.theme('default')
        .primaryPalette('blue', {
            'default': '800', // by default use shade 800 from the pink palette for primary intentions
            'hue-1': '100', // use shade 100 for the <code>md-hue-1</code> class
            'hue-2': '600', // use shade 600 for the <code>md-hue-2</code> class
            'hue-3': 'A100' // use shade A100 for the <code>md-hue-3</code> class
        })
        // If you specify less than all of the keys, it will inherit from the
        // default shades
        .accentPalette('pink', {
            'default': '600' // use shade 600 for default, and keep all other shades the same
        })
        .warnPalette('psatPalette')
        .backgroundPalette('grey');
}

export default OnConfig;
