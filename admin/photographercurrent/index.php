<?php
	$pageName = "Photographer All";
	include("../include/header.php");
	if(isset($_GET["photographerIdDelete"]))
	{
		if(mysqli_query($connection, "DELETE FROM `photographer` WHERE `photographerId` = '" . $_GET["photographerIdDelete"] . "'"))
		{
			header("Location:../photographercurrent/");
		}
	}
	if(isset($_GET["status"]) && isset($_GET["photographerId"]))
	{
		if(mysqli_query($connection, "UPDATE `photographer` SET `status` = '" . $_GET["status"] . "' WHERE `photographerId` = '" . $_GET["photographerId"] . "'"))
		{
			header("Location:../photographercurrent/");
		}
	}
?>
					<!-- Spacer starts -->
					<div class="spacer">
						
						<!-- Row Starts -->
						<div class="row">
							<div class="col-md-12 col-sm-12 col-xs-12">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title"><?php echo $pageName; ?></h4>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<div id="dt_example" class="table-responsive example_alt_pagination clearfix">
												<table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
													<thead>
														<tr>
															<th>#</th>
															<th>Name</th>
															<th>E-Mail</th>
															<th>Mobile No.</th>
                                                            <th>Password</th>
															<th>Profile</th>
															<th>Status</th>
                                                            <th>Login</th>
                                                            <th>Chat</th>
                                                            <th>Delete</th>
														</tr>
													</thead>
													<tbody>
                                                    <?php
													$i = 1;
													$result = mysqli_query($connection, "SELECT * FROM `photographer` ORDER BY `photographerId` DESC");
													while($row = mysqli_fetch_array($result))
													{
													?>
														<tr>
															<td><?php echo $i++; ?></td>
															<td><?php echo $row["firstName"] . " " . $row["lastName"]; ?></td>
                                                            <td><?php echo $row["email"]; ?></td>
                                                            <td><?php echo $row["mobileNumber"]; ?></td>
                                                            <td><?php echo $row["password"]; ?></td>
                                                            <td><a href="../../images/photographer/<?php echo $row["profile"]; ?>" target="_blank"><img src="../../images/photographer/<?php echo $row["profile"]; ?>" style="max-width:100px;min-width:100px;box-shadow:0px 0px 1px 1px #000;" /></a></td>
                                                            <td><a href="?status=<?php echo $row["status"] == "ON" ? "OFF" : "ON"; ?>&photographerId=<?php echo $row["photographerId"]; ?>" class="btn btn-<?php echo $row["status"] == "ON" ? "success" : "danger"; ?> btn-xs"><?php echo $row["status"] == "ON" ? $row["status"] : "OFF"; ?></a></td>
                                                            <td><?php echo $row["login"] == "YES" ? "<i class=\"fa fa-circle text-success\"></i>" : "<i class=\"fa fa-circle text-danger\"></i>"; ?></td>
                                                            <td><a href="../chat/?photographerId=<?php echo $row["photographerId"]; ?>&pageName=<?php echo $pageName; ?>" data-toggle="tooltip" data-placement="left" title="Chat of <?php echo $row["firstName"] . " " . $row["lastName"]; ?>"><i class="fa fa-comment-o"></i></a></td>
                                                            <td><a href="?photographerIdDelete=<?php echo $row["photographerId"]; ?>" data-toggle="tooltip" data-placement="left" title="Delete" onclick="javascript:return confirm('Are You Sure You Want To Remove This Request?');return false;"><i class="fa fa-trash-o"></i></a></td>
														</tr>
													<?php
													}
													?>
                                                    </tbody>
												</table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Row Ends -->

					</div>
					<!-- Spacer ends -->
<?php
	include("../include/footer.php");
?>