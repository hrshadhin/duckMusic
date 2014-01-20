var mbdApp = angular.module('mbdApp', ['ngRoute'])
//route section
 mbdApp.config(function($routeProvider) {
    $routeProvider

      // route for the home page
      .when('/', {
        templateUrl : 'partial/home.html',
        controller  : 'mainController'
      })

      // route for the about page
      .when('/about', {
        templateUrl : 'partial/about.html',
        controller  : 'aboutController'
      });
  });

  //factory section
mbdApp.factory('mbdFactory', function() {
  return {
      getAtoZ: function() {
          return  ['A','B','C','D','E','F','G','H',
          'I','J','K','L','M','N','O','P','Q','R',
          'S','T','U','V','W','X','Y','Z'];
      },
  };
});
 
mbdApp.controller('arCtrl', function($scope, mbdFactory) {
  $scope.a2z = mbdFactory.getAtoZ();
});

//controller section
  mbdApp.controller('mainController', function($scope) {
    $scope.go = function(atoz) {
         
          $scope.msg = atoz;
        }

  });

  mbdApp.controller('aboutController', function($scope) {
    $scope.message = 'Look! I am an about page.';
  });