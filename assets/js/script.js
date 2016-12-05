var app = angular.module("demoapp", ["openlayers-directive"]);
app.controller("DemoController", [ '$scope', function($scope) {
  $scope.showDetails = function(id) {
    alert('lat: '+ id.lat+', '+'lon: asdfasf '+id.lon);
  };
  angular.extend($scope, {
    center: {
      lat: 13,
      lon: 80,
      zoom: 7
    }
  });
    $scope.markers = [];
			$scope.addMarker = function (value) {
			$scope.markers.push({
                name: value.name,
                lat: value.lat,
                lon: value.lon,
                label: {
                     message: value.name + value.edate,
                     show: false,
                     showOnMouseOver: true,
					 
						},
						onClick: function (event, properties) {
							console.log(properties); 
							alert('lat: '+ properties.lat+', '+'lon: '+properties.lon);
						  } 
				 
				});
			};
			for (i = 0; i < cities.length; i++){
                  $scope.addMarker(cities[i]);
				   
              }
  
   
}]);