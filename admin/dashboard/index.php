<?php
	$pageName = "Dashboard";
	include("../include/header.php");
	if(isset($_GET["photographerIdDelete"]))
	{
		if(mysqli_query($connection, "DELETE FROM `photographer` WHERE `photographerId` = '" . $_GET["photographerIdDelete"] . "'"))
		{
			header("Location:../dashboard/");
		}
	}
?>
					<!-- Current Stats Start -->
					<div class="current-stats">
						<div class="row">
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="danger-bg center-align-text">
									<div class="spacer-xs">
										<i class="fa fa-camera fa-2x"></i>
										<small class="text-white">Photographer Offline</small>
										<h3 class="no-margin no-padding"><?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer` WHERE `login` != 'YES'")); ?></h3>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="success-bg center-align-text">
									<div class="spacer-xs">
										<i class="fa fa-camera fa-2x"></i>
										<small class="text-white">Photographer Online</small>
										<h3 class="no-margin no-padding text-white"><?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer` WHERE `login` = 'YES'")); ?></h3>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="info-bg center-align-text">
									<div class="spacer-xs">
										<i class="fa fa-camera fa-2x"></i>
										<small class="text-white">Image Uploads</small>
										<h3 class="no-margin no-padding"><?php echo mysqli_num_rows(mysqli_query($connection, "SELECT `photosId` FROM `photos`")); ?></h3>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="brown-bg center-align-text">
									<div class="spacer-xs">
										<i class="fa fa-camera fa-2x"></i>
										<small class="text-white">Photographer ON</small>
										<h3 class="no-margin no-padding"><?php
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer` WHERE `status` = 'ON'"));
										?></h3>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="linkedin-bg center-align-text">
									<div class="spacer-xs">
										<i class="fa fa-camera fa-2x"></i>
										<small class="text-white">Photographer OFF</small>
										<h3 class="no-margin no-padding"><?php
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer` WHERE `status` != 'ON'"));
										?></h3>
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-4 col-sm-4 col-xs-6">
								<div class="twitter-bg center-align-text">
									<div class="spacer-xs">
										<i class="fa fa-camera fa-2x"></i>
										<small class="text-white">Photographer</small>
										<h3 class="no-margin no-padding text-white"><?php
                                        echo mysqli_num_rows(mysqli_query($connection, "SELECT `photographerId` FROM `photographer`"));
										?></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Current Stats End -->

					<!-- Spacer starts -->
					<div class="spacer">

						<!-- Row Start -->
						<div class="row">
							<?php /*?><div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<!-- Widget starts -->
								<div class="blog blog-info">
									<div class="blog-header">
										<h5 class="blog-title">Photographer Chats</h5>
									</div>
									<div class="blog-body">
										<ul class="chats">
											<li class="in">
												<img class="avatar" alt="" src="../img/user2.jpg">
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name" data-original-title="" title="">Sandy</a>
													<span class="date-time">
														at May 21st, 2014 12:0<i class="fa fa-clock-o"></i>
													</span>
													<div class="progress-stats clearfix">
														<i class="fa fa-camera-retro pull-left fa-lg text-info"></i>
														<div class="progress">
															<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
															</div>
														</div>
													</div>
													<span class="body body-grey">
														Raw denim heard of them master cleanse.
													</span>
												</div>
											</li>
											<li class="out">
												<img class="avatar" alt="" src="../img/user3.jpg">
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name" data-original-title="" title="">Peter</a>
													<span class="date-time">
														at May 14th, 2014 09:32<i class="fa fa-clock-o"></i>
													</span>
													<span class="body body-blue">
														Next level veard stumptown, thundercats <i class="fa fa-smile-o fa-lg text-primary"></i>
													</span>
												</div>
											</li>
											<li class="in">
												<img class="avatar" alt="" src="../img/user4.jpg">
												<div class="message">
													<span class="arrow"></span>
													<a href="#" class="name" data-original-title="" title="">Johnson</a>
													<span class="date-time">
														at Apr 28th, 2014 09:47<i class="fa fa-clock-o"></i>
													</span>
													<span class="body body-grey">
														Beard stumptown scenester farm-to-table.
													</span>
												</div>
											</li>
										</ul>
									</div>
								</div>
								<!-- Widget ends -->
							</div><?php */?>
							<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-12 col-xs-12">
								<!-- Widget starts -->
								<div class="blog blog-danger">
									<div class="blog-header">
										<h5 class="blog-title">Recently Registered Photographer</h5>
									</div>
									<div class="blog-body">
										<ul class="clients-list">
                                        <?php
										$resultPG = mysqli_query($connection, "SELECT * FROM `photographer` WHERE `status` != 'ON' ORDER BY `photographerId` DESC");
										while($rowPG = mysqli_fetch_array($resultPG))
										{
										?>
											<li class="client clearfix">
												<img src="../../images/photographer/<?php echo $rowPG["profile"]; ?>" class="avatar" alt="Client">
												<div class="client-details">
													<p>
														<span class="name"><?php echo $rowPG["firstName"] . " " . $rowPG["lastName"]; ?></span>
														<span class="email"><?php echo $rowPG["email"]; ?></span>
													</p>
													<ul class="icons-nav">
														<li>
															<a href="?photographerIdDelete=<?php echo $rowPG["photographerId"]; ?>" data-toggle="tooltip" data-placement="left" title="Delete" onclick="javascript:return confirm('Are You Sure You Want To Remove This Request?');return false;">
																<i class="fa fa-trash-o"></i>
															</a>
														</li>
                                                        <?php
                                                        if(!empty($rowPG["email"]))
														{
														?>
														<li>
															<a href="mailto:<?php echo $rowPG["email"]; ?>" data-toggle="tooltip" data-placement="left" title="E-Mail">
																<i class="fa fa-envelope-o"></i>
															</a>
														</li>
                                                        <?php
														}
														if(!empty($rowPG["mobileNumber"]))
														{
														?>
														<li>
															<a href="tel:<?php echo $rowPG["mobileNumber"]; ?>" data-toggle="tooltip" data-placement="left" title="Mobile No.">
																<i class="fa fa-phone"></i>
															</a>
														</li>
                                                        <?php
														}
														?>
													</ul>
												</div>
											</li>
										<?php
										}
										?>
                                        </ul>
									</div>
								</div>
								<!-- Widget ends -->
							</div>
						</div>
						<!-- Row End -->

					</div>
					<!-- Spacer ends -->
<?php
	include("../include/footer.php");
?>