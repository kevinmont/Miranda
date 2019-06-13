
mirandaApp.controller('productController', function ($scope, $http, $location, $filter) {
    $scope.Product = [{
        id: "",
        nombre: "",
        imagen: "",
        material: "",
        estilo: "",
        color: "",
        descripcion: "",
        nPag: ""
    }];

    $scope.productArrayPageFiltered = [];
    $scope.arrayPaginas = [1];
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
            $scope.productArrayPageFiltered = $filter('filter')($scope.Product, { nPag: "1" });
            noMaxPage = $scope.Product[products.length - 1].nPag;
            console.info('Array filtered')
            console.info($scope.productArrayPageFiltered);
            console.log(noMaxPage);
            for (i = 0; i < noMaxPage; i++) {
                $scope.arrayPaginas[i] = i + 1;
            }

        } else {
            throw new Error("response products is not an array");
        }
    }

    $scope.getProducts = function () {
        $scope.$http("POST", "controllers/ProductosController.php", drawProducts)
    }
    
    $scope.cambiaPagina = function (nPagAct) {
        if (nPagAct == 0)
            $scope.productArrayPageFiltered = $scope.Product;
        else
            $scope.productArrayPageFiltered = $filter('filter')($scope.Product, { nPag: nPagAct });
    }

    $scope.getProducts();
})




