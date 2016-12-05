<!DOCTYPE html>
<html >
<head>
<meta charset="ISO-8859-1">
<title>CompanyView</title>
<link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/map.css">
<script
  src="<?php echo ASSET_URL; ?>/js/angular.js"></script>

 <!-- <script type="text/javascript">
 function userController($scope,$http) {
     $scope.cities = [];
     $http.get('<?php //echo site_url('angularjs/get_list'); ?>').success(function($data){ $scope.cities=$data; });
 }
</script>  -->
 
</head>
<body>


<div ng-app="myApp" ng-controller="myCtrl">
  <form novalidate>
  <h1 align="center"> Company Registration </h1>
  <table border =1 cellspacing=0 cellpadding=10 align="center">
  <tr><td>
    Company Admin:</td><td>
   <input name="companyadmin" ng-model="companyadmin" required>
   <span ng-show="myForm.companyadmin.$touched && myForm.companyadmin.$invalid">The name is required.</span></td></tr>
   <tr><td>
    Contact Details: </td><td>
    <input name="contactdetails" ng-model="contactdetails" required>
   <span ng-show="myForm.contactdetails.$touched && myForm.contactdetails.$invalid">The name is required.</span></td></tr>
    <tr><td>Document Details : </td><td>
	<input type="file" name="marketdoc" file-model="mydoc" /> </td></tr>
	<tr><td>
	Logo: </td><td>
	<input type="file" name="logo" file-model="mylogo"/> </td></tr>
	 </table>
	 <div style="width: 150px;margin-left: auto;margin-right: auto;margin-top:10px;"> 
	<button ng-click="uploadFile()" align="center">Confirm Reservation</button>  
	</div>
  </form>
 
</div>

<script>
var myApp = angular.module('myApp', []);
myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);
// We can write our own fileUpload service to reuse it in the controller
myApp.service('fileUpload', ['$http', function ($http) {
    this.uploadFileToUrl = function(mydoc,mylogo, uploadUrl, cadmin,cdetails){
         var fd = new FormData();
         fd.append('logo', mylogo);
		 fd.append('marketdoc',mydoc);
         fd.append('companyadmin', cadmin);
		 fd.append('contactdetails', cdetails);
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(){
            window.alert("Reservation done successfully!");
         })
         .error(function(){
             window.alert("Reservation failed !");
         });
     }
 }]);

 myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){

   $scope.uploadFile = function(){
        var mydoc = $scope.mydoc;
		var mylogo = $scope.mylogo;
        var uploadUrl = "registration/createcompany";
        var cadmin = $scope.companyadmin;
		var cdetails = $scope.contactdetails;
        fileUpload.uploadFileToUrl(mydoc,mylogo, uploadUrl, cadmin,cdetails);
   };

}]);
</script>
	

</body>
</html>