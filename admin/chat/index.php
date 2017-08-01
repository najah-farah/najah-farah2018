<?php
	$pageName = isset($_GET["pageName"]) ? $_GET["pageName"] : "Photographer's Chat";
	include("../include/header.php");
	$rowPG = mysqli_fetch_array(mysqli_query($connection,  "SELECT `firstName`, `lastName`, `profile` FROM `photographer` WHERE `photographerId` = '" . $_GET["photographerId"] . "'"));
?>
					<!-- Spacer starts -->
					<div class="spacer">
						
						<!-- Row Starts -->
						<div class="row">
							<div class="col-md-4 col-lg-4 <?php  echo isset($_GET["chatWith"]) ? "" : "col-md-offset-4 col-lg-offset-4"; ?> col-sm-12 col-xs-12">
								<div class="panel">
									<div class="panel-heading">
										<h4 class="panel-title">Chat of <?php echo $rowPG["firstName"] . " " . $rowPG["lastName"]; ?></h4>
									</div>
									<div class="panel-body">
										<div class="table-responsive">
											<div id="dt_example" class="table-responsive example_alt_pagination clearfix">
												<table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">    
													<thead>
														<tr>
															<th>#</th>
															<th>Chat With</th>
														</tr>
													</thead>
													<tbody>
                                                    <?php
													$chatArray = array();
													$resultChat = mysqli_query($connection, "SELECT `photographerIdFrom`, `photographerIdTo` FROM `chat` WHERE `photographerIdFrom` = '" . $_GET["photographerId"] . "' OR `photographerIdTo` = '" . $_GET["photographerId"] . "' ORDER BY `date` DESC");
													while($rowChat = mysqli_fetch_array($resultChat))
													{
														if($_GET["photographerId"] != $rowChat["photographerIdFrom"])
														{
															if(!in_array($rowChat["photographerIdFrom"], $chatArray))
															{
																$chatArray[] = $rowChat["photographerIdFrom"];
															}
														}
														else if($_GET["photographerId"] != $rowChat["photographerIdTo"])
														{
															if(!in_array($rowChat["photographerIdTo"], $chatArray))
															{
																$chatArray[] = $rowChat["photographerIdTo"];
															}
														}
													}
													foreach($chatArray as $key => $value)
													{
														$rowChatPG = mysqli_fetch_array(mysqli_query($connection, "SELECT `firstName`, `lastName` FROM `photographer` WHERE `photographerId` = '" . $value . "'"));
													?>
														<tr>
                                                        	<td><?php echo $key + 1; ?></td>
                                                            <td><a href="?photographerId=<?php echo $_GET["photographerId"]; ?>&pageName=<?php echo $pageName; ?>&chatWith=<?php echo $value; ?>"><?php echo $rowChatPG["firstName"] . " " . $rowChatPG["lastName"]; ?></a></td>
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
                            <?php
                            if(isset($_GET["chatWith"]))
							{
								$rowChatWith = mysqli_fetch_array(mysqli_query($connection, "SELECT `firstName`, `lastName`, `profile` FROM `photographer` WHERE `photographerId` = '" . $_GET["chatWith"] . "'"));
							?>
							<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
								<!-- Widget starts -->
								<div class="blog blog-info">
									<div class="blog-header">
										<h5 class="blog-title"><?php echo $rowPG["firstName"] . " " . $rowPG["lastName"] . " Chat With " . $rowChatWith["firstName"] . " " . $rowChatWith["lastName"]; ?></h5>
									</div>
									<div class="blog-body">
										<ul class="chats">
                                        <?php
										$chatResult = mysqli_query($connection, "SELECT * FROM `chat` WHERE `photographerIdFrom` IN ('" . $_GET["photographerId"] . "', '" . $_GET["chatWith"] . "') AND `photographerIdTo` IN ('" . $_GET["photographerId"] . "', '" . $_GET["chatWith"] . "')");
										while($chatRow = mysqli_fetch_array($chatResult))
										{
										?>
											<li class="<?php
                                            if($chatRow["photographerIdFrom"] == $_GET["photographerId"])
											{
												echo "out";
											}
											else if($chatRow["photographerIdTo"] == $_GET["photographerId"])
											{
												echo "in";
											}
											?>">
												<img class="avatar" alt="" src="../../images/photographer/<?php
                                                if($chatRow["photographerIdFrom"] == $_GET["photographerId"])
												{
													 echo $rowPG["profile"];
												}
												else if($chatRow["photographerIdTo"] == $_GET["photographerId"])
												{
													 echo $rowChatWith["profile"];
												}
												?>" title="<?php
                                                if($chatRow["photographerIdFrom"] == $_GET["photographerId"])
												{
													 echo $rowPG["firstName"] . " " . $rowPG["lastName"];
												}
												else if($chatRow["photographerIdTo"] == $_GET["photographerId"])
												{
													 echo $rowChatWith["firstName"] . " " . $rowChatWith["lastName"];
												}
												?>">
												<div class="message">
													<span class="arrow"></span>
													<span class="date-time">
														<?php echo date("d-m-Y g:i A", strtotime($chatRow["date"])) ?><i class="fa fa-clock-o"></i>
													</span>
													<span class="body body-blue">
														<?php echo $chatRow["message"]; ?>
													</span>
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
                            <?php
							}
							?>
						</div>
						<!-- Row Ends -->

					</div>
					<!-- Spacer ends -->
<?php
	include("../include/footer.php");
?>