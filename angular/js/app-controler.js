var duckApp = angular.module('duckApp',['ngRoute','ngSanitize']);

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
    }).when('/artists/:alpha/:arName/' ,{
      templateUrl: 'partials/albums.html' ,
      controller : 'albumsCtrl'
    }).when('/artists/:alpha/:arName/:album/' ,{
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

var rootURL = "http://duck.hrshadhin.me/lara/";

duckApp.controller('alphaCtrl' , function($scope ,$http , $location){
  var data = $.jStorage.get($location.path());
  if(!data){
        $http.get( rootURL + 'alpha').success(function(data){
         $.jStorage.set($location.path(),data);
         $scope.results = data ;
        });
    }else{
                $scope.results = $.jStorage.get($location.path()) ;
        }
    $scope.click = function(value){
            $location.path("/artist/" + value + "/");;
          }
});

duckApp.controller('artistsCtrl' , function($scope , $http , $location , $routeParams){
  var data = $.jStorage.get($location.path());
  if(!data){
        $http.post((rootURL + 'artistsnames'),{'alpha':$routeParams.alpha}).success(function(data){
         $.jStorage.set($location.path(),data);
         $scope.results = data ;
        });
    }else{
                $scope.results = $.jStorage.get($location.path()) ;
        }
    $scope.click = function(value){
            $location.path("/artists/" +$routeParams.alpha+"/"+encodeURI(value)+"/");
          }
});

duckApp.controller('albumsCtrl' , function($scope , $http , $location , $routeParams){
  var data = $.jStorage.get($location.path());
  if(!data){
        $http.post( (rootURL + 'albums') , {'alpha' : $routeParams.alpha,'name' : $routeParams.arName }).success(function(data){
         $.jStorage.set($location.path(),data);
         $scope.results = data ;
        });
    }else{
                $scope.results = $.jStorage.get($location.path()) ;
        }
    $scope.click = function(value){
            $location.path("/artists/" + $routeParams.alpha + "/" + $routeParams.arName + "/"+ encodeURI(value) + "/");
          }
});

duckApp.controller('songsCtrl' , function($scope , $http , $location , $routeParams){
  var data = $.jStorage.get($location.path());
  if(!data){
        $http.post( (rootURL + 'songs') , {'alpha' : $routeParams.alpha,'name' : $routeParams.arName,'album' : $routeParams.album }).success(function(data){
         $.jStorage.set($location.path(),data);
         $scope.results = data ;
        });
    }else{
                $scope.results = $.jStorage.get($location.path()) ;
        }
    $scope.click = function(name,url){
            $scope.s=name;
            console.log(url);
            console.log($scope.s);
            $("#jquery_jplayer_1").jPlayer({
                ready: function () {
                  $(this).jPlayer("setMedia", {
                    mp3:url
                  }).jPlayer('play');
                },
                swfPath: "Jplayer.swf",
                supplied: "mp3"
            });
          }
});





