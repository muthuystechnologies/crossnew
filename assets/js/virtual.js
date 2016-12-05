var app = angular.module("demoapp", ['ui.bootstrap',"openlayers-directive"]);
	  app.controller('ModalInstanceCtrl',[
  '$scope', '$modalInstance', 'items',
   function ($scope, $modalInstance, items) {

  $scope.items = items;
  
  //alert(items.length);
  
  $scope.selected = {
    item: $scope.items[0]
  };

  $scope.ok = function () {
    window.location = "company";
    $modalInstance.close($scope.selected.item);
  };
}]);
	app.controller("StaticImageController", [ '$scope', '$modal', function($scope,$modal) {
		   $scope.items = [];
			  $scope.open = function () {
				var modalInstance = $modal.open({
				  templateUrl: 'myModalContent.html',
				  controller:'ModalInstanceCtrl',
				  resolve: {
					items: function () {
					  return $scope.items;
					}
				  }
				});
			  };
			  $scope.additems = function (value1,value2) {
				  
			$scope.items.push({
				
				 image:value1,
				 standdetails:value2
			});
			  }
			$scope.markers = [];
			
			$scope.addMarker = function (value) {
			$scope.markers.push({
				image:value.image,
				Booked:value.Booked,
				standdetails:value.standdetails,
				price : value.price,
                name: value.name,
				map:value.mapurl,
				projection:'pixel',
				coord:[value.mapx,value.mapy],
				label: {
                     message: (value.Booked)==1?"Booked"+"<br /><li> Contact :"+value.contactdetails+"</li><li><a href=''>Market Document</a></li>":"Free" + "<br />"+"<li>Price : "+value.price+ "</li><li> Click to Reserve</li>",
                     show: true,
                     showOnMouseOver: false,
				},
				style: {image : { icon : { anchor: [0.5,1],anchorXUnits:'fraction',anchorYUnits:'fraction',src: (value.Booked)==1?'uploads/'+value.logo:'uploads/map-marker-icon.png'} } } , 
				 
						});
			}
			for (i = 0; i < cities.length; i++){
                  $scope.addMarker(cities[i]);
				 
				  //alert(cities[i].name);
              }
			angular.extend($scope, {
            center: {
                coord: [ 900, 600 ],
                zoom: 2
            },
             //custom_style : custom_style, 
            defaults: {
                view: {
                    projection: 'pixel',
                    extent: [ 0, 0, 1800, 1200 ]
                },
				 events: {
                        map: [ 'singleclick' ]
                    }
            },
            staticlayer: {
                source: {
                    type: "ImageStatic",
                    url: "assets/img/"+$scope.markers[0].map,
                    imageSize: [ 1800, 1200 ]
                }
            }
        });
		$scope.showDetails = function(marker) {
			if(marker.Booked ==0){
                $scope.items=[];
				//console.log(marker);
				  $scope.additems(marker.image,marker.standdetails);
				 $scope.open(); 
			}
			};
      }]);