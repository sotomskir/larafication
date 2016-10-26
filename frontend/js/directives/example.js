function ExampleDirective() {
    return {
            restrict: 'E',
            templateUrl: 'directives/example.html',
            scope: {
                title: '@'
            }
    };

}

export default {
    name: 'example',
    fn: ExampleDirective
};