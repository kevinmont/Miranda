
mirandaApp.controller('productController', function ($scope, $http) {
    $scope.Product = [{
        id: "",
        nombre: "",
        imagen: "",
        material: "",
        estilo: "",
        color: "",
        descripcion: ""
    }];

    $scope.itemPerPage = 3;

    $scope.$http = function (method, url, callback) {
        $http({
            method: method,
            url: url
        }).then(function (response) {
            console.info("response from server side");
            console.log(response)
            var data = angular.fromJson(response.data);
            if (data.status == 200) {
                callback(data.products)
            } else if (data.status == 204) {
                console.warn("response from server side was 204");
            }

        });
    }

    var drawProducts = function (products) {
        if (Array.isArray(products)) {
            $scope.Product = products;
            console.log($scope.Product);

        } else {
            throw new Error("response products is not an array");
        }
    }

    $scope.getProducts = function () {
        $scope.$http("POST", "controllers/ProductosController.php", drawProducts)
    }

    $scope.getProducts();
})




