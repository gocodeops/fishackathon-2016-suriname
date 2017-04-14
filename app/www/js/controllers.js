angular.module('starter.controllers', [])

.controller('MyLocationCtrl', function($scope, $state, $http, $stateParams) {
  var myCenter=new google.maps.LatLng(5.835303, -55.157455);

  function initialize()
  {
  var mapProp = {
    center:myCenter,
    zoom:15,
    mapTypeId:google.maps.MapTypeId.ROADMAP
    };

  var map=new google.maps.Map(document.getElementById("mylocation_map"),mapProp);

  var marker=new google.maps.Marker({
    position:myCenter,
    });

  marker.setMap(map);
  }

  google.maps.event.addDomListener(window, 'load', initialize);
})

.controller('MapCtrl', function($scope, $state, $ionicPopup, $timeout) {
  $.get('http://192.168.1.10/fishackathon-2016/backend/index.php/area/getall/', 
      function(data){
      data = jQuery.parseJSON(data);
      var locations = [];

      $.each(data, function(i, value){
        area_lat = value.lat;
        area_lng = value.lng;
        area_color = value.color;
        area_radius = value.radius;
        area_content = value.content;
        locations.push([area_lat, area_lng, area_color, area_content, area_radius]);
      });

      var map = new google.maps.Map(document.getElementById('protected_areas'), {
        zoom: 7,
        center: new google.maps.LatLng(6.610255, -55.468282),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var area, i;
      var areas = new Array();
      for (i = 0; i < locations.length; i++) { 
        radius = parseInt(locations[i][4]);
        area = new google.maps.Circle({
          center: new google.maps.LatLng(locations[i][0], locations[i][1]),
          radius: radius,
          strokeColor:"#E74C3C",
          strokeOpacity: 0.8,
          strokeWeight: 1,
          fillColor: locations[i][2],
          fillOpacity:0.6,
          map: map
        });
        areas.push(area);
        google.maps.event.addListener(area, 'click', (function(area, i) {
          return function() {
            alert(locations[i][3]);
          }
        })(area, i));
      }
    });
})

.controller('LawsCtrl', function($scope, $state, $ionicModal, $http) {
  // Modal
  // $ionicModal.fromTemplateUrl('templates/search-law.html', {
  //   scope: $scope
  // }).then(function(modal) {
  //   $scope.modal = modal;
  // });

  // show and hide seacrhfield
  $scope.show = false;
    $scope.searchshow = function() {
        $scope.show = !$scope.show;
    }

  // seacrh parameters
  $('#search').hideseek({
    nodata: 'No results found',
    highlight: true,
    ignore: '.ignore'
  });

  $scope.items = [];
  var getlawsurl = "http://192.168.1.10/fishackathon-2016/backend/index.php/law/getall/";

  $http.get(getlawsurl)
  .success(function(response){
    console.log(response);
    angular.forEach(response, function(child){
      $scope.items.push(child);
    });
  })
  .error(function(response, status){
    console.log("Failed to get posts");
  });

  $scope.toggleItem= function(item) {
    if ($scope.isItemShown(item)) {
      $scope.shownItem = null;
    } else {
      $scope.shownItem = item;
    }
  };
  $scope.isItemShown = function(item) {
    return $scope.shownItem === item;
  };

})

.controller('DocksCtrl', function($scope, $state, $http, $stateParams) {
  $.get('http://192.168.1.10/fishackathon-2016/backend/index.php/marker/getall/', 
      function(data){
      data = jQuery.parseJSON(data);
      var locations = [];

      $.each(data, function(i, value){
        marker_content = value.content;
        marker_lat = value.lat;
        marker_lng = value.lng;
        locations.push([marker_content, marker_lat, marker_lng])
      });
      console.log(locations);

      var map = new google.maps.Map(document.getElementById('docks_map'), {
        zoom: 7,
        center: new google.maps.LatLng(4.418028, -55.109356),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });
      var infowindow = new google.maps.InfoWindow();
      var marker, i;
      var markers = new Array();
      for (i = 0; i < locations.length; i++) { 
        marker = new google.maps.Marker({
          position: new google.maps.LatLng(locations[i][1], locations[i][2]),
          map: map
        });
        markers.push(marker);
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
          return function() {
            infowindow.setContent(locations[i][0]);
            infowindow.open(map, marker);
          }
        })(marker, i));
      }
    });
});
