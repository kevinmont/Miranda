var mirandaApp = angular.module('mirandaApp', ['ngRoute']);

mirandaApp.config(function ($routeProvider) {
    $routeProvider.when('/', {
        templateUrl: "views/home.html"
    }).when('/products', {
        templateUrl: "views/products.html",
        controller: "productController"
    }).when('/sign-in', {
        templateUrl: "views/sign-in.html"
    }).when('/sign-up', {
        templateUrl: "views/sign-up.html"
    }).when('/login', {
        templateUrl: "views/login.html"
    }).when('/new-product', {
        templateUrl: "views/new-products.html"
    }).when('/cart', {
        templateUrl: "views/buying.html"
    })
})

mirandaApp.controller('initController', function ($scope, $htpp) {
    $scope.isLogged = false;
    
    
});
