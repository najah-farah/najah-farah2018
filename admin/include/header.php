<?php
	include("../include/dbConnection.php");
	if(!isset($_SESSION["adminId"]))
	{
		header("Location:../");
	}
?>
<!DOCTYPE html>
<html lang="en"><head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<meta name="description" content="PhotoShare | <?php echo $pageName; ?>" />
		<meta name="keywords" content="PhotoShare | <?php echo $pageName; ?>" />
		<meta name="author" content="PhotoShare | <?php echo $pageName; ?>" />
		<link rel="shortcut icon" href="../img/favicon.ico">
		<title>PhotoShare | <?php echo $pageName; ?></title>
		
		<!-- Bootstrap CSS -->
		<link href="../css/bootstrap.css" rel="stylesheet" media="screen">

		<!-- Animate CSS -->
		<link href="../css/animate.css" rel="stylesheet" media="screen">

		<!-- Alertify CSS -->
		<link href="../css/alertify/alertify.core.css" rel="stylesheet">
		<link href="../css/alertify/alertify.default.css" rel="stylesheet">

		<!-- Main CSS -->
		<link href="../css/main.css" rel="stylesheet" media="screen">

		<!-- Datepicker CSS -->
		<link rel="stylesheet" type="text/css" href="../css/datepicker.css">

		<!-- Font Awesome -->
		<link href="../fonts/font-awesome.min.css" rel="stylesheet">

	</head>  

	<body>

		<!-- Header Start -->
		<header>

			<!-- Logo starts -->
			<div class="logo">
				<a href="../dashboard/">
					<img src="../img/logo.png" alt="logo">
				</a>
			</div>
			<!-- Logo ends -->

			<!-- Mini right nav starts -->
			<div class="pull-right">
				<ul id="mini-nav" class="clearfix">
					<li class="list-box hidden-lg hidden-md hidden-sm" id="mob-nav">
						<a href="#">
							<i class="fa fa-reorder"></i>
						</a>
					</li>
					<li class="list-box user-profile hidden-xs">
						<a href="../dashboard/" class="user-avtar animated rubberBand">
							<img src="../img/<?php echo (isset($_SESSION["profile"]) ? $_SESSION["profile"] : ""); ?>" alt="user avatar">
						</a>
					</li>
				</ul>
			</div>
			<!-- Mini right nav ends -->

		</header>
		<!-- Header ends -->

		<!-- Left sidebar starts -->
		<aside id="sidebar">

			<!-- Current User Starts -->
			<div class="current-user">
				<div class="user-avatar animated rubberBand">
					<img src="../img/<?php echo (isset($_SESSION["profile"]) ? $_SESSION["profile"] : ""); ?>" alt="Current User">
					<span class="busy"></span>
				</div>
				<div class="user-name"><?php echo (isset($_SESSION["firstName"]) ? $_SESSION["firstName"] : "") . " " . (isset($_SESSION["lastName"]) ? $_SESSION["lastName"] : ""); ?></div>
				<ul class="user-links">
					<li>
						<a href="../profile/">
							<i class="fa fa-user text-success"></i>
						</a>
					</li>
					<li>
						<a href="../logout/">
							<i class="fa fa-sign-out text-danger"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- Current User Ends -->

			<!-- Menu start -->
			<div id='menu'>
				<ul>
					<li class="<?php echo $pageName == "Dashboard" ? "highlight" : ""; ?>">
						<a href='../dashboard/'>
							<i class="fa fa-desktop"></i>
							<span>Dashboard</span>
							<?php echo $pageName == "Dashboard" ? "<span class=\"current-page\"></span>" : ""; ?>
						</a>
					</li>
					<li class='has-sub<?php echo $pageName == "Photographer ON" || $pageName == "Photographer OFF" || $pageName == "Photographer All" ? " highlight active" : ""; ?>'>
						<a href='#'>
							<i class="fa fa-camera"></i> 
							<span>Photographer</span>
						</a>
						<ul<?php echo $pageName == "Photographer ON" || $pageName == "Photographer OFF" || $pageName == "Photographer All" ? " style=\"display: block\"" : ""; ?>>
							<li>
								<a href='../photographeron/'<?php echo $pageName == "Photographer ON" ? " class=\"select\"" : ""; ?>>
									<span>ON</span>
								</a>
							</li>
							<li>
								<a href='../photographeroff/'<?php echo $pageName == "Photographer OFF" ? " class=\"select\"" : ""; ?>>
									<span>OFF</span>
								</a>
							</li>
							<li>
								<a href="../photographercurrent/"<?php echo $pageName == "Photographer All" ? " class=\"select\"" : ""; ?>>
									<span>All</span>
								</a>
							</li>
						</ul>
					</li>
					<li class="<?php echo $pageName == "Photos" ? "highlight" : ""; ?>">
						<a href='../photos/'>
							<i class="fa fa-picture-o"></i>
							<span>Photos</span>
							<?php echo $pageName == "Photos" ? "<span class=\"current-page\"></span>" : ""; ?>
						</a>
					</li>
					<li class="<?php echo $pageName == "Payments" ? "highlight" : ""; ?>">
						<a href='../payments/'>
							<i class="fa fa-money"></i>
							<span>Payments</span>
							<?php echo $pageName == "Payments" ? "<span class=\"current-page\"></span>" : ""; ?>
						</a>
					</li>
				</ul>
			</div>
			<!-- Menu End -->

			<!-- Freebies Starts -->
			<div class="freebies">
				
				<!-- Sidebar Extras -->      
				<div class="sidebar-addons">
					<ul class="views">
						<li>
							<i class="fa fa-circle-o text-success"></i>
							<div class="details">
								<p>Users Online</p>
							</div>
							<span class="label label-success"><?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer` WHERE `login` = 'YES'")); ?></span>
						</li>
                        <li>
							<i class="fa fa-circle-o text-danger"></i>
							<div class="details">
								<p>Users Offline</p>
							</div>
							<span class="label label-danger"><?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer` WHERE `login` != 'YES'")); ?></span>
						</li>
						<li>
							<i class="fa fa-circle-o text-info"></i>
							<div class="details">
								<p>Image Uploads</p>
							</div>
							<span class="label label-info"><?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `photosId` FROM `photos`")); ?></span>
						</li>         
					</ul>
				</div>

			</div>
			<!-- Freebies Starts -->

		</aside>
		<!-- Left sidebar ends -->
		<!-- Dashboard Wrapper starts -->
		<div class="dashboard-wrapper">

			<!-- Top Bar starts -->
			<div class="top-bar">
				<div class="page-title">
					<?php echo $pageName; ?>
				</div>
			</div>
			<!-- Top Bar ends -->

			<!-- Main Container starts -->
			<div class="main-container">

				<!-- Container fluid Starts -->
				<div class="container-fluid">