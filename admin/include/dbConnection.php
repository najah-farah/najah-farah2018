<?php
	ob_start();
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	$connection = mysqli_connect("eu-cdbr-azure-west-b.cloudapp.net", "b9db452a40f590", "f87895d8", "acsm_439bc1316ce35ab") or die("Error In Connection.");
?>
