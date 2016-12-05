<!DOCTYPE html>
<html ng-app="demoapp" class="ng-scope">
 <head>
     <title>Exposition - Virtual</title>
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/ol3/3.7.0/ol.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>/js/angular.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>/js/angular-sanitize.min.js"></script>
	<script src="http://tombatossals.github.io/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/ol.css" />
	<link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/stylenew.css" />
	<link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/angular-openlayers-directive.css" />
	<script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.10.0.js"></script>  
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" />
	<script src="<?php echo ASSET_URL; ?>/js/virtual.js"></script>
	<script type="text/javascript">
			var city = '<?php echo $stand;?>';
			var cities = JSON.parse(city);
			
	</script>
</head>
  <body ng-controller="StaticImageController">
     <openlayers ol-center="center" ol-defaults="defaults" custom-layers="true" height="600px">
         <ol-layer ol-layer-properties="staticlayer"></ol-layer>
         <ol-marker  ng-repeat="marker in markers" ol-marker-properties="marker"  ol-style="custom_style" ng-click="showDetails(marker)"> </ol-marker>
     </openlayers>
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3>Reservation</h3>
        </div>
        <div class="modal-body">
          <ng-form name="myForm">
            <div ng-repeat="item in items">
                   <img ng-src="uploads/{{item.image}}" /> <br /> <br />
					 Stand Details :  {{item.standdetails}}
            </div>
        </ng-form>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" ng-click="ok()">Reserve</button>
        </div>
    </script>
  </body>
</html>
