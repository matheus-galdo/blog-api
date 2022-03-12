app.controller('TesteController', function ($scope, $http) {
    $scope.nome = "Galgal"

    $scope.salve = function (params) {
        console.log('salve');
        $http.get('/service/internal/processos/{0}/capa'.format(id))
        .then(function (res) {
            console.log(res)
        })
    }
})