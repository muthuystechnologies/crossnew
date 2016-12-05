//Data
/* var cities = [
              {
                  city : 'Chennai  ',
                  desc : 'Kathipara Bridge!',
                  lat : 13.000000,
                  long : 80.250000
              }
          ]; */

          //Angular App Module and Controller
          var sampleApp = angular.module('mapsApp', []);
		 
		  
          sampleApp.controller('MapCtrl', function ($scope, $rootScope, $compile) {
			  
			  var latlngCenter = new google.maps.LatLng("13", "80");

              var mapOptions = {
				  zoom: 6,
                   center: latlngCenter,
		    mapTypeControl: true,
		    mapTypeControlOptions: {
		      style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
		    },
		    navigationControl: true,
		    mapTypeId: google.maps.MapTypeId.ROADMAP
              }

              $scope.map = new google.maps.Map(document.getElementById('map'), mapOptions);

              $scope.markers = [];
              
              var infoWindow = new google.maps.InfoWindow();
             
              var createMarker = function (info){
                  //window.alert(info);
                  var marker = new google.maps.Marker({
                      map: $scope.map,
                      position: new google.maps.LatLng(info.latitude, info.longitude),
                      title: info.Name
                  });
                  marker.content = '<div id="infoWindowContent">' + info.Location  + '</br></br>'+ info.EventDate+ '</br></br>'+'</div>';
                  var compiledContent = $compile(document.getElementById("infoWindowContent"))($scope)
				  window.alert(compiledContent);
                  google.maps.event.addListener(marker, 'mousemove',(function(marker, content, scope) {
					   return function() {
						   $scope.eventname="test";
                      infoWindow.setContent('<h2>' + marker.title + '</h2>' + marker.content);
                      infoWindow.open(scope.map, marker);
					  
					  //window.alert($scope.eventname);
					   }
                  })(marker, compiledContent[0], $scope));
                  
                  $scope.markers.push(marker);
                  
              }  
              //alert(cities);
              for (i = 0; i < cities.length; i++){
                  createMarker(cities[i]);
              }
			
              

          });