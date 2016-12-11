import angular from 'angular';

let loginComponent = angular.module('rsLogin', [])
    .component('rsLogin', {
        templateUrl: '/templates/components/login/login.html',
        bindings: {
            email: "=?",
            password: "=?",
            errorPassword: "=?",
            errorEmail: "=?"
        },
        controller: function() {
            const vm = this;
            vm.email = '';
            vm.password = '';
            vm.errorPassword = '';
            vm.errorEmail = '';
            // You can access the bindings here or inside your view
            // console.log(this.name); // -> World
            vm.getCsrfToken = function () {
                return window.Laravel.csrfToken;
            }
        }
    });

export default loginComponent;