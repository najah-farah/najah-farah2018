<?php
	$pageName = "Payments";
	include("../include/header.php");
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
                                                            <th>Title</th>
                                                            <th>Photo</th>
                                                            <th>Price</th>
                                                            <th>Currency Cde</th>
                                                            <th>Payment Status</th>
                                                            <th>Transaction ID</th>
														</tr>
													</thead>
													<tbody>
                                                    <?php
													$i = 1;
													$result = mysqli_query($connection, "SELECT `photographer`.`firstName`, `photographer`.`lastName`, `photos`.`photosName`, `photos`.`image`, `payments`.`payment_gross`, `payments`.`currency_code`, `payments`.`payment_status`, `payments`.`txn_id` FROM `payments` LEFT JOIN `photographer` ON `payments`.`photographerId` = `photographer`.`photographerId` LEFT JOIN `photos` ON `payments`.`photosId` = `photos`.`photosId` ORDER BY `payments`.`paymentsId` DESC");
													while($row = mysqli_fetch_array($result))
													{
													?>
														<tr>
															<td><?php echo $i++; ?></td>
															<td><?php echo $row["firstName"] . " " . $row["lastName"]; ?></td>
                                                            <td><?php echo $row["photosName"]; ?></td>
                                                            <td><a href="../../images/portfolio/<?php echo $row["image"]; ?>" target="_blank"><img src="../../images/portfolio/<?php echo $row["image"]; ?>" style="max-width:100px;min-width:100px;box-shadow:0px 0px 1px 1px #000;" /></a></td>
                                                            <td><?php echo $row["payment_gross"]; ?></td>
                                                            <td><?php echo $row["currency_code"]; ?></td>
                                                            <td><?php echo $row["payment_status"]; ?></td>
                                                            <td><?php echo $row["txn_id"]; ?></td>
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