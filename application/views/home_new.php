<!DOCTYPE html>
<html ng-app="demoapp" class="ng-scope">
  <head>
     <title>Exposition</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ol3/3.7.0/ol.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>/js/angular.min.js"></script>
    <script src="<?php echo ASSET_URL; ?>/js/angular-sanitize.min.js"></script>
    <script src="http://tombatossals.github.io/angular-openlayers-directive/dist/angular-openlayers-directive.js"></script>
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/ol.css" />
	<link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/stylenew.css" />
    <link rel="stylesheet" href="<?php echo ASSET_URL; ?>/css/angular-openlayers-directive.css" />
	<script src="<?php echo ASSET_URL; ?>/js/home.js"></script>
	<script type="text/javascript">
		var city = '<?php echo $event;?>';
		var cities = JSON.parse(city);
	</script>
</head>
  <body ng-controller="DemoController">
		<openlayers ol-center="center" ol-markers="markers" height="400px" width="100%">
			  <ol-marker  ng-repeat="marker in markers"  ol-marker-properties="marker"   >
			  </ol-marker>
		</openlayers>
		<p>Mouse over the markers to show an image associated with each one.</p>
		<label >Event Name  :</label><label  ng-bind="mouseclickposition1 | json"></label></br>
		<label >Event Location  :</label><label ng-bind="mouseclickposition2 | json"></label></br>
		<label >Event Date  :</label><label ng-bind="mouseclickposition3 | json"></label></br>
		<input type="button" ng-click="centerAndShow()" value="Book your place" />
		<input type="hidden" ng-model="idval" name = "eventid" />
	  
  </body>
</html>