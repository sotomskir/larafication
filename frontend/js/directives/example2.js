function ExampleDirective2() {
    return {
            restrict: 'E',
            templateUrl: 'directives/example2.html',
            scope: {
                title: '@'
            }
    };

}

export default {
    name: 'example2',
    fn: ExampleDirective2
};