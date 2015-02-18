<!DOCTYPE html>
<html>
	<head>

<!--==================Plugins===============-->
		<link rel="stylesheet" type="text/css" href="plugins/animate.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.structure.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.theme.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/waitme/waitMe.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/flexigrid/css/flexigrid.pack.css"/>
		
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		
<!--==================Plugins:END===============-->
		
<!--==================Plugins===============-->
		<script src="plugins/jquery-2.0.3.min.js"></script>
		<script src="plugins/bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
		<script src="plugins/dialog-extend/jquery.dialogextend.min.js"></script>
		<script src="plugins/waitme/waitMe.min.js"></script>
		<script src="plugins/flexigrid/js/flexigrid.pack.js"></script>
		<script src="js/utilities.js"></script>
<!--==================Plugins:END===============-->
		
		<script src="js/script.js"></script>
		
	</head>

	
	<body>
	
<?php
require_once("config.php");

foreach($modules as $module)
{
	echo "<div id = '$module' data-role = 'dialog' style = 'display: none;'>";
	require_once("modules/" . $module . ".php");
	echo "</div>";
}
?>	
		<div class="header">
			<div class="container">
				
			</div>
		</div>
		<div class="sub-header">
			<div class="container">
				<div class="btn">
					lorem
				</div>
				<div class="btn">
					ipsum
				</div>
			</div>
		</div>
		
	</body>

</html>