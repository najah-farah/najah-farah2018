<?php
	session_start();
	unset($_SESSION["adminId"]);
	unset($_SESSION["firstName"]);
	unset($_SESSION["lastName"]);
	unset($_SESSION["profile"]);
	header("Location:../");
?>