var duckApp = angular.module('duckApp',['ngRoute']);

duckApp.config(
  function($routeProvider){
    $routeProvider
    .when("/" ,{
      templateUrl:'partials/home.html'
      //controller: 'hirenx'
    })
    //http://www.music.com.bd/download/browse/
    .when("/explore" ,{
      templateUrl:'partials/alphaselect.html',
      controller: 'alphaCtrl'
    })
    .when("/about" ,{
      templateUrl:'partials/about.html',
      //controller: 'alphaCtrl'
    })
    .when('/artist/:alpha/' ,{
      templateUrl: 'partials/artistsNames.html' ,
      controller : 'artistsCtrl'
    }).when('/artists/:alpha/:arName' ,{
      templateUrl: 'partials/albums.html' ,
      controller : 'albumsCtrl'
    }).when('/artists/:alpha/:arName/:album' ,{
      templateUrl: 'partials/songs.html' ,
      controller : 'songsCtrl'
    });;
   
  });

function spaceRemove(darray){
    var clarray=[];
    darray.forEach(function(item){
        item=item.trim();
        clarray.push(item);
    });
    return clarray;

}

var rootURL = "http://localhost/Hiren-Music/public/index.php/";
duckApp.controller('alphaCtrl' , function($scope ,$http , $location){
  $http.get( rootURL + 'alpha').success(function(data){
    $scope.results = data ;

    $scope.click = function(value){
      $location.path("/artist/" + value + "/");;
    }
  });
});

duckApp.controller('artistsCtrl' , function($scope , $http , $location , $routeParams){
  $http.post((rootURL + 'artistsnames'),{'alpha':$routeParams.alpha}).success(function(data){
    var cdata=spaceRemove(data);
    $scope.results = cdata ;
  });
  $scope.click = function(value){
    $location.path("/artists/" +$routeParams.alpha+"/"+encodeURI(value)+"/");
  }
});
duckApp.controller('albumsCtrl' , function($scope , $http , $location , $routeParams){
  $http.post( (rootURL + 'albums') , {'alpha' : $routeParams.alpha,'name' : $routeParams.arName }).success(function(data){
    $scope.results = data;
  });
  $scope.click = function(value){
    $location.path("/artists/" + $routeParams.alpha + "/" + $routeParams.arName + "/"+ encodeURI(value) + "/");
  }
});
duckApp.controller('songsCtrl' , function($scope , $http , $location , $routeParams){
  $http.post( (rootURL + 'songs') , {'alpha' : $routeParams.alpha,'name' : $routeParams.arName,'album' : $routeParams.album }).success(function(data){
    $scope.results = data;
    //console.dir($scope.results);
    //console.log($scope.results[0].name);
  });
  $scope.click = function(value){
    $location.path("/artists/" + $routeParams.alpha + "/" + $routeParams.arName + "/"+ encodeURI(value) + "/");
  }
});