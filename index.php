<?php require_once("config.php");?>
<!DOCTYPE HTML>
<html>
	<head>

		<meta charset="utf-8">
<!--==================Plugins===============-->
		<link rel="stylesheet" type="text/css" href="plugins/animate.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.structure.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/jquery-ui.theme.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/waitme/waitMe.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/bootstrap/css/bootstrap-theme.css"/>
		<link rel="stylesheet" type="text/css" href="plugins/flexigrid/css/flexigrid.pack.css"/>
		
		<link rel="stylesheet" type="text/css" href="css/theme.css"/>
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
		<script src="js/menu-driver.js"></script>
		<script src="js/interaction-driver.js"></script>
		
		<title>National Bookstore</title>
	</head>

	
	<body data-core-url='<?php echo $coreUrl; ?>'>
	
<?php

$i = 0;
foreach($modules as $module)
{
	echo "<div id = '$module' data-role = 'dialog' style = 'display: none;' data-index='$i'>";
	require_once("modules/" . $module . ".php");
	echo "</div>";
	$i++;
}

echo $coreUrl;
?>
		<div class="header">
			<ul class="container nav">
				<li class="pull-right"><a class="dropdown-toggle" onclick="accounts.logout();">Logout</a></li>
			</ul>
		</div>
		
		<div class="wrapper"></div>
<!--		<div class="loading-page"></div>-->
	</body>

</html>