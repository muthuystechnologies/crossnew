 var app = angular.module("demoapp", ["openlayers-directive"]);
        app.controller("DemoController", [ '$scope', function($scope) {
			$scope.centerAndShow = function(id)
				{
					//alert($scope.idval);
					window.location = "virtualmap?id="+$scope.idval;
				}
		
			//var markers=cities;
			$scope.markers = [];
			$scope.addMarker = function (value) {
			$scope.markers.push({
				id : value.ID,
                name: value.name,
				location:value.Location,
				edate:value.edate,
                lat: value.lat,
                lon: value.lon,
                label: {
                     message: value.name + value.edate,
                     show: false,
                     showOnMouseOver: true,
					
				 
				},
				 onClick: function (event, properties) {
							console.log(properties); 
							//alert('lat: '+ properties.lat+', '+'lon: '+properties.lon);
							$scope.mouseclickposition1 = properties.name;
							$scope.mouseclickposition2 = properties.location;
							$scope.mouseclickposition3 = properties.edate;
							$scope.idval = properties.id;
						  }
						});
			}
			for (i = 0; i < cities.length; i++){
                  $scope.addMarker(cities[i]);
				  //alert(cities[i].name);
              }
            angular.extend($scope, {
                center: {
                    lat: 13,
                    lon: 80,
                    zoom: 7
                },
				
                   
				
            });

            
        } ]);
		