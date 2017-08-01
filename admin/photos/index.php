<?php
	$pageName = "Photos";
	include("../include/header.php");
	if(isset($_GET["photosIdDelete"]))
	{
		if(mysqli_query($connection, "DELETE FROM `photos` WHERE `photosId` = '" . $_GET["photosIdDelete"] . "'"))
		{
			header("Location:../photos/");
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
															<th>Photographer</th>
															<th>Category</th>
															<th>Title</th>
                                                            <th>Photo</th>
                                                            <th>Price</th>
                                                            <th>Delete</th>
														</tr>
													</thead>
													<tbody>
                                                    <?php
													$i = 1;
													$result = mysqli_query($connection, "SELECT * FROM `photos` LEFT JOIN `photographer` ON `photos`.`photographerId` = `photographer`.`photographerId` ORDER BY `photos`.`photosId` DESC");
													while($row = mysqli_fetch_array($result))
													{
													?>
														<tr>
															<td><?php echo $i++; ?></td>
															<td><?php echo $row["firstName"] . " " . $row["lastName"]; ?></td>
                                                            <td><?php echo $row["category"]; ?></td>
                                                            <td><?php echo $row["photosName"]; ?></td>
                                                            <td><a href="../../images/portfolio/<?php echo $row["image"]; ?>" target="_blank"><img src="../../images/portfolio/<?php echo $row["image"]; ?>" style="max-width:100px;min-width:100px;box-shadow:0px 0px 1px 1px #000;" /></a></td>
                                                            <td><?php echo $row["price"]; ?></td>
                                                            <td><a href="?photosIdDelete=<?php echo $row["photosId"]; ?>" data-toggle="tooltip" data-placement="left" title="Delete" onclick="javascript:return confirm('Are You Sure You Want To Remove This Photo\'s?');return false;"><i class="fa fa-trash-o"></i></a></td>
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