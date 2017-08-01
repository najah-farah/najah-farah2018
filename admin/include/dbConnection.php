<?php
	ob_start();
	session_start();
	date_default_timezone_set("Asia/Kolkata");
	$connection = mysqli_connect("localhost", "root", "", "xpertmon_photoshare") or die("Error In Connection.");
?>