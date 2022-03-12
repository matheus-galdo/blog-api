var app = angular.module("galdoBlog", ['ngRoute']);

app.config(function($routeProvider,$locationProvider, $httpProvider) {

  //Disable Cache
  if (!$httpProvider.defaults.headers.get) {
    $httpProvider.defaults.headers.get = {};
  }
  $httpProvider.defaults.headers.get['If-Modified-Since'] = 'Mon, 26 Jul 1997 05:00:00 GMT';
  $httpProvider.defaults.headers.get['Cache-Control'] = 'no-cache';
  $httpProvider.defaults.headers.get['Pragma'] = 'no-cache';


  $locationProvider.html5Mode({enabled: true,
    requireBase: true});
    $routeProvider
    .when("/", {
        templateUrl : "application/main.html",
        controller : 'TesteController',
    })
    .when("/post/:slug", {
		  templateUrl : "application/teste.html",
		controller : 'readController',
		// controllerAs : 'ctrl'
    })

    $routeProvider.otherwise({redirectTo: '/'});
})



app.controller('appController', ['$scope','$http', function ($scope) {
    $scope.nome = "Galgal"
    
}])



app.directive("ngTitle", function() {
    nome = "Funfa"
    return {
      template : `<title>${nome}</title>`
    };
});

app.controller('TesteController', function ($scope, $http) {
  $scope.nome = "Galguela"

  $scope.salve = function () {
      
      $http.get('/projetoLaravel/blogApi/public/api/list-all-posts')
      .then(function (res) {
        console.log(res.data);
          $scope.postlist = res.data
      })
  }
})

app.controller('readController', function ($scope, $http, $routeParams) {
  $http.get(`/projetoLaravel/blogApi/public/api/read-post/${$routeParams.slug}`)
  .then(function (res) {
    $scope.post = res.data
  })

  // $scope.salve = function () {
  //     console.log('salve');
      
  // }
})

