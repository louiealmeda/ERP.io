<?php

//$coreUrl = "http://localhost:1994/erp-core/";
//$coreUrl = str_replace("erp.io/","",$_SERVER["HTTP_REFERER"]) . "erp-core/";
$coreUrl = "http://" .$_SERVER["HTTP_HOST"] . "/erp-core/";



$modules = array(
	"login",
	"create",
	"purchasing",
	"sales",
	"inventory",
	"view-all-accounts",
	"changePassword",
	"createVendors"
);
