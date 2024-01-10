<?php 
session_start();
	if(!$_SESSION['st_username'] && !$_SESSION['st_password'])
	{
	header("location:index.php");
	}else{
		$st_username = $_SESSION['st_username'];
		$st_password = $_SESSION['st_password'];
		$st_grade = $_SESSION['st_grade'];
		$st_id = $_SESSION['st_id'];

		include "../connection.php";
		$stmt = mysqli_prepare($con, "SELECT * FROM student_info WHERE student_name = ? AND student_id = ?");
		mysqli_stmt_bind_param($stmt, "ss", $st_username, $st_id);
		mysqli_stmt_execute($stmt);
		$info_raw = mysqli_stmt_get_result($stmt);
		$info_refined = mysqli_fetch_assoc($info_raw);
	}
	if(isset($_POST['change_password']))
	{
		
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];

		$stmt = mysqli_prepare($con, "SELECT * FROM student_info WHERE student_pwd = ? AND student_name = ?");
		mysqli_stmt_bind_param($stmt, "ss", $old_password, $st_username);
		mysqli_stmt_execute($stmt);
		$old_results = mysqli_stmt_get_result($stmt);
		$old_results1 = mysqli_fetch_assoc($old_results);
		$old_pwd = @$old_results1['student_pwd'];
		
		if($old_pwd != $old_password)
		{ 
			echo "<script>alert('Old Password Does not Match');</script>";	
		}
		else
		{
			$stmt = mysqli_prepare($con, "UPDATE student_info 
			SET student_pwd = ? WHERE student_id = ? AND student_name = ?");
			mysqli_stmt_bind_param($stmt, "sis", $new_password, $st_id, $st_username);
			if(mysqli_stmt_execute($stmt)){
			echo "<script>alert('Password successfully changed. Re-login.')</script>";
			echo "<script>window.location.href = 'index.php';</script>";
			}else{
			echo "<script>alert('Error! Invalid inputs. Please cross check.');</script>";
			echo "<script>window.location.href = 'home.php';</script>";
			}
		}
		
	}
?>

<!DOCTYPE HTML>
<html>
<head>
	<title>Student Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Augment Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function() {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<link href="css/font-awesome.css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<script src="js/jquery-1.10.2.min.js"></script>
	<script src="js/amcharts.js"></script>
	<script src="js/serial.js"></script>
	<script src="js/light.js"></script>
	<script src="js/radar.js"></script>
	<link href="css/barChart.css" rel='stylesheet' type='text/css' />
	<link href="css/fabochart.css" rel='stylesheet' type='text/css' />
	<!--clock init-->
	<script src="js/css3clock.js"></script>
	<!--Easy Pie Chart-->
	<!--skycons-icons-->
	<script src="js/skycons.js"></script>

	<script src="js/jquery.easydropdown.js"></script>

</head>

<body>
	<div class="page-container">
		<div class="left-content">
			<div class="inner-content">
				<div class="header-section">

					<div class="clearfix"></div>
				</div>
				<div class="outter-wp">
					<div class="tab-main">
						<div class="tab-inner">
							<div id="tabs" class="tabs">
								<h2 class="inner-tittle">
									<?php
									$timeNow = date("h");
									$timeState = date("a");

									if($timeNow == 12 || $timeNow < 11 && $timeState == "am")
									{
										echo "Good morning, ", ucfirst($st_username);

									}elseif($timeNow == 12 || $timeNow < 5 && $timeState =="pm")
									{
										echo "Good afternoon, ", ucfirst($st_username);
									}
									elseif($timeNow >= 5 && $timeState == "pm")
									{
										echo "Good evening, ", ucfirst($st_username);	

									}
									 ?> </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i><span> Information</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="fa fa-lock"></i><span> Change Password</span></a></li>
											<li><a href="#section-3" class="icon-food"><i class="fas fa-chalkboard-teacher" aria-hidden="true"></i><span> Teachers</span></a></li>
											<li><a href="#section-4" class="icon-truck"><i class="fa fa-user"></i><span> Results</span></a></li>
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Personal Information</strong>
												<p><strong>Grade: </strong>
													<?php echo ucfirst($info_refined['student_grade']); ?>
												</p>
												<p><strong>Gender: </strong>
													<?php echo ucfirst($info_refined['student_gender']); ?>
												</p>
												<p> <strong>Date of Birth:</strong>
													<?php echo ($info_refined['student_dob']); ?>
												</p>

											</div>
											<div class="mediabox">
												<strong>Contact Details</strong>

												<p> <strong>Address:</strong>
													<?php echo ucfirst($info_refined['student_address']); ?>
												</p>
												<p> <strong>Town:</strong>
													<?php echo ucfirst($info_refined['student_town']); ?>
												</p>
											</div>
											<div class="mediabox">
												<strong>Parents' Details</strong>
												<p><strong>Parent's Name: </strong>
													<?php echo ucfirst($info_refined['student_parent']); ?>
												</p>
												<p><strong>Parents' Contact: </strong>
													<?php echo ucfirst($info_refined['student_phone']); ?>
												</p>
											</div>
										</section>
										<section id="section-2">
										
											
											<div class="col-md-12">
												<form method="post">
												<div class="input-group input-icon">
													<span class="input-group-addon">
												<i class="fa fa-key"></i>	</span>
													<input type="password" class="form-control1 icon" name="old_password" placeholder="Old Password" required>
													
												</div>
												<div class="input-group input-icon">
													<span class="input-group-addon">
												<i class="fa fa-key"></i>	</span>
													<input type="password" class="form-control1 icon" placeholder="New Password" name="new_password" required>
													
												</div>	
										
													<input type="submit" name="change_password" class="a_demo_four" value="Change Password">
													</form>
											</div>
										</section>
										<section id="section-3">
												<div class="graph">
															<div class="tables">
															
																<table class="table table-hover"> 
																	<thead>
																		<tr> 
																			<th>#</th> 
																			<th>Photo</th> 
																			<th>Teacher Name</th> 
																			<th>Subject</th>
																			<th>Email</th> 
																			<th>Phone</th>
																		</tr> 
																	</thead> 
																	<tbody>
															<?php 
															include "../connection.php";
															$stmt = mysqli_prepare($con, "SELECT * FROM t_info WHERE t_grade = ?");
															mysqli_stmt_bind_param($stmt, "s", $st_grade);
															mysqli_stmt_execute($stmt);
															$result = mysqli_stmt_get_result($stmt);
																while($row = mysqli_fetch_assoc($result)){ 
																	$sn = 1;
																		?>
																		<tr>
																			<th scope="row"><?php echo $sn; ?></th>
																			<td></td>
																			<td><?php echo ucwords($row['t_name']); ?></td> 
																			<td><?php echo ucwords($row['t_subject']); ?></td> 
																			<td><?php echo strtolower($row['t_email']); ?></td> 
																			<td><?php echo $row['t_phone']; ?></td>
																		</tr> 
																		<?php $sn++; } ?>
																	</tbody> 
																</table>
															</div>
												
													</div>
										</section>
										
										<section id="section-4">
										<table border="1" style="width:100%;" class="table table-hover"> 
											<thead>
												<tr> 
													<th>#</th> 
													<th>Student</th> 
													<th>Subject</th>
													<th>Score</th>
													<th>Position</th>
													<th>Class Position</th>
												</tr> 
											</thead> 
											<tbody>
										<?php 
											include "../connection.php";
											$stmt = mysqli_prepare($con,  "SELECT * FROM student_info WHERE student_grade = ? AND student_id = ?");
											mysqli_stmt_bind_param($stmt, 'si', $st_grade, $st_id);
											mysqli_stmt_execute($stmt);
											$student_results = mysqli_stmt_get_result($stmt);

											$sn = 1;
											while($row = mysqli_fetch_assoc($student_results)){
												echo "<tr>";
													echo "<td rowspan='7'>".$sn. "</td>";
													echo "<td rowspan='7'>".$row['student_name']."</td>";
													echo "<td>"."Mathematics"."</td>";
													echo "<td>".$row['Mathematics']."%"."</td>";
													echo "<td>"."1"."st"."</td>";
													echo "<td rowspan='7'>"."<span>"."7"."th"."</span>"."</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>"."English" ."Language"."</td>";
													echo "<td>".$row['English Language']."%"."</td>";
													echo "<td>"."7"."th"."</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>"."Int". "Science"."</td>";
													echo "<td>".$row['Int Science']."%"."</td>";
													echo "<td>"."1"."st"."</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>"."Social" ."Studies"."</td>";
													echo "<td>".$row['Social Studies']."%"."</td>";
													echo "<td>"."3"."rd"."</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>"."French"."</td>";
													echo "<td>".$row['French']."%"."</td>";
													echo "<td>"."3"."rd"."</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>"."OWOP"."</td>";
													echo "<td>".$row['OWOP']."%"."</td>";
													echo "<td>"."3"."rd"."</td>";
												echo "</tr>";
												echo "<tr>";
													echo "<td>"."ICT"."</td>";
													echo "<td>".$row['ICT']."%"."</td>";
													echo "<td>"."3"."rd"."</td>";
												"</tr>";
													$sn++;
											  }
											?>
												</tbody> 
											</table>
										</section>
									</div>
								</div>
							</div>
							<script src="js/cbpFWTabs.js"></script>
							<script>
								new CBPFWTabs(document.getElementById('tabs'));
							</script>
							<div class="clearfix"> </div>
						</div>
					</div>
					<!--/charts-->
					<div class="charts">
						<div class="chrt-inner">
							<!--//weather-charts-->
							<div class="graph-visualization">
								
								<div class="col-md-6 map-2">
									<div class="profile-nav alt">
										<section class="panel">
											<div class="user-heading alt clock-row terques-bg">
												<h3 class="sub-tittle clock">Easy Clock </h3>
											</div>
											<ul id="clock">
												<li id="sec"></li>
												<li id="hour"></li>
												<li id="min"></li>
											</ul>
										</section>
									</div>
								</div>
								<div class="clearfix"> </div>
							</div>


						</div>
						<!--/charts-inner-->
					</div>
					<!--//outer-wp-->
				</div>
				<!--footer section start-->
				<footer>
					<p>&copy <?php echo  date("Y") ?>. All Rights Reserved | </p>
				</footer>
			</div>
		</div>
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.php"> <span id="logo"> <h1><?php echo $st_username; ?></h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			
			<div class="down">
				<a href="#"><img src="images/admin.jpg"></a>
				<a href="#"><span class=" name-caret"><?php echo $st_username; ?></span></a>
				<p>Student</p>
				<ul>
					<li><a class="tooltips" href="#"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
					<li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
					<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="#"><i class="fa fa-tachometer"></i> <span>DASHBOARD</span></a></li>
				</ul>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<script>
		var toggle = true;

		$(".sidebar-icon").click(function() {
			if (toggle) {
				$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
				$("#menu span").css({
					"position": "absolute"
				});
			} else {
				$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
				setTimeout(function() {
					$("#menu span").css({
						"position": "relative"
					});
				}, 400);
			}

			toggle = !toggle;
		});
	</script>
	<!--js -->
	<link rel="stylesheet" href="css/vroom.css">
	<script type="text/javascript" src="js/vroom.js"></script>
	<script type="text/javascript" src="js/TweenLite.min.js"></script>
	<script type="text/javascript" src="js/CSSPlugin.min.js"></script>
	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>