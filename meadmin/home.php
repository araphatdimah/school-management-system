<?php
session_start();
if (!$_SESSION['admin_username'] && !$_SESSION['admin_password']) {
	header("location:index.php");
} else {
	$admin_username = $_SESSION['admin_username'];
	$admin_gender = $_SESSION['admin_gender'];
	$admin_phone = $_SESSION['admin_phone'];
	$admin_parent = $_SESSION['admin_parent'];
	$admin_parent_phone = $_SESSION['admin_parent_phone'];
	$admin_email = $_SESSION['admin_email'];
	$admin_address = $_SESSION['admin_address'];

	include "../connection.php";
	$std_array = array();
	$t_array = array();

	$stmt = mysqli_prepare($con, "SELECT * FROM student_info");
	mysqli_stmt_execute($stmt);
	$students_raw = mysqli_stmt_get_result($stmt);

	while ($student_row = mysqli_fetch_assoc($students_raw)) {
		$std_array[] = $student_row;
	}
	$all_students = count($std_array);

	$stmt1 = mysqli_prepare($con, "SELECT * FROM t_info");
	mysqli_stmt_execute($stmt1);
	$teachers_raw = mysqli_stmt_get_result($stmt1);
	while ($teacher_row = mysqli_fetch_assoc($teachers_raw)) {
		$t_array[] = $teacher_row;
	}
	$all_teachers = count($t_array);
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Admin Home</title>
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
		} <script src = 'https://kit.fontawesome.com/a076d05399.js' >
	</script>
	 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">  
	<!-- Bootstrap Core CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
	<!-- Custom CSS -->
	<link href="css/style.css" rel='stylesheet' type='text/css' />
	<!-- Graph CSS -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- jQuery -->
	<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'>
	<!-- lined-icons -->
	<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
	<!-- //lined-icons -->
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
	<script>
		$(document).ready(function() {
			$("#mySearch2").on("keyup", function() {
				var value = $(this).val().toLowerCase().trim();
				$("#student_list tr").each(function() {
					var rowText = $(this).text().toLowerCase();
					$(this).toggle(rowText.indexOf(value) > -1 || value === "");
				});
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$("#mySearch3").on("keyup", function() {
				var value = $(this).val().toLowerCase().trim();
				$("#std_results tr").each(function() {
					var rowText = $(this).text().toLowerCase();
					$(this).toggle(rowText.indexOf(value) > -1 || value === "");
				});
			});
		});
	</script>
	<script>
		$(document).ready(function() {
			$("#mySearch4").on("keyup", function() {
				var value = $(this).val().toLowerCase().trim(); // Ensure trimmed lowercase value
				$("#teacher_search tr").each(function() {
					var rowText = $(this).text().toLowerCase();
					$(this).toggle(rowText.indexOf(value) > -1 || value === "");
				});
			});
		});
	</script>
</head>

<body>
	<div class="page-container">
		<!--/content-inner-->
		<div class="left-content">
			<div class="inner-content">
				<!-- header-starts -->
				<div class="header-section">

					<div class="clearfix"></div>
				</div>
				<!-- //header-ends -->

				<div class="outter-wp">
					<!--/tabs-->
					<div class="tab-main">
						<!--/tabs-inner-->
						<div class="tab-inner">
							<div id="tabs" class="tabs">
								<h2 class="inner-tittle">
									<?php
									$timeNow = date("h");
									$timeState = date("a");
									if ($timeNow == 12 || $timeNow < 11 && $timeState == "am") {
										echo "Good morning, ", ucfirst($admin_username);
									} elseif ($timeNow == 12 || $timeNow < 5 && $timeState == "pm") {
										echo "Good afternoon, ", ucfirst($admin_username);
									} elseif ($timeNow >= 5 && $timeState == "pm") {
										echo "Good evening, ", ucfirst($admin_username);
									}
									?>
								</h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i><span> Personal Info</span></a></li>
											<li><a href="#section-2" class="icon-lab"><i class="fas fa-chalkboard-teacher"></i><span> Teachers</span></a></li>
											<li><a href="#section-3" class="icon-lab"><i class="fa fa-user"></i><span> Students</span></a></li>
											<li><a href="#section-4" class="icon-lab"><i class="fa fa-book"></i><span> Results</span></a></li>
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Personal Details</strong>
												<p> <strong>Name:</strong>
													<?php echo $admin_username;
													?>
												</p>
												<p> <strong>Gender:</strong>
													<?php echo $admin_gender;
													?>
												</p>
											</div>
											<div class="mediabox">
												<strong>Contact Details</strong>
												<p> <strong>Contact:</strong>
													<?php echo $admin_phone;
													?>
												</p>
												<p> <strong>Email:</strong>
													<?php echo $admin_email;
													?>
												</p>
												<p> <strong>Address:</strong>
													<?php echo $admin_address;
													?>
												</p>

											</div>
											<div class="mediabox">
												<strong>Parents Details</strong>
												<p> <strong>Parent:</strong>
													<?php echo $admin_parent;
													?>
												</p>
												<p> <strong>Parent's Contact:</strong>
													<?php echo $admin_parent_phone;
													?>
												</p>
											</div>

										</section>
										<section id="section-2">
											<div class="tables">
												<table style="width: 100%;" class="table table-hover">
													<input type="search" id="mySearch4" style="width: 50%; margin: 2% 20%; color:black; border-radius:8px; border-color:#021F4E;
											 				background-color:whitesmoke;" placeholder="Search teacher...">
													<thead>
														<tr>
															<th>#</th>
															<th>Photo</th>
															<th>Name</th>
															<th>Gender</th>
															<th>Subject</th>
															<th>Grade</th>
															<th>Email</th>
															<th>Contact</th>
															<th>Town</th>
														</tr>
													</thead>
													<tbody id="teacher_search">
														<?php
														include "../connection.php";
														$stmt = mysqli_prepare($con, "SELECT * FROM t_info");
														mysqli_stmt_execute($stmt);
														$teacher_info = mysqli_stmt_get_result($stmt);
														$t_sn = 1;
														while ($row = mysqli_fetch_assoc($teacher_info)) {
														?>
															<tr>
																<th scope="row"><?php echo $t_sn . "."; ?></th>
																<th><img style="width:55px; height:43px;" class="rounded-circle" src = "../uploads/<?php echo isset($row['t_profile']) ? $row['t_profile'] : 'no-image.png'; ?>"></th>
																<td><?php echo $row['t_name']; ?></td>
																<td><?php echo $row['t_gender']; ?></td>
																<td><?php echo $row['t_subject']; ?></td>
																<td><?php echo $row['t_grade']; ?></td>
																<td><?php echo $row['t_email']; ?></td>
																<td><?php echo $row['t_phone']; ?></td>
																<td><?php echo $row['t_town']; ?></td>
															</tr>
														<?php $t_sn++;
														} ?>
													</tbody>
												</table>
											</div>
										</section>
										<section id="section-3">
											<div class="tables">
												<table class="table table-hover">
													<thead>
														<form id="get_students_form">
															<select style="width: 50%; margin: 0 6%" id="gender" name="student_grade" type="text" required>
																<option selected disabled>--Select Grade</option>
																<option>Grade 1</option>
																<option>Grade 2</option>
																<option>Grade 3</option>
																<option>Grade 4</option>
																<option>Grade 5</option>
																<option>Grade 6</option>
																<option>Grade 7</option>
																<option>Grade 8</option>
																<option>Grade 9</option>
																<option>Grade 10</option>
															</select>
															<input type="submit" name="std_submit" value="Fetch">
														</form>

														<input type="search" id="mySearch2" style="width: 50%; margin: 2% 20%; color:black; border-radius:8px; border-color:#021F4E;
											 				background-color:whitesmoke;" placeholder="Search student...">
														<tr>
															<th>#</th>
															<th>Photo</th>
															<th>Name</th>
															<th>Gender</th>
															<th>Parent</th>
															<th>Contact</th>
															<th>Town</th>
														</tr>
													</thead>
													<tbody id="student_list">
													</tbody>
												</table>
											</div>
										</section>
										<section id="section-4">
											<div class="tables">
												<form id="students_results_form">
													<select style="width: 50%; margin: 0 6%" name="student_grade3" required>
														<option value="">--Select Grade--</option>
														<option value="Grade 1">Grade 1</option>
														<option value="Grade 2">Grade 2</option>
														<option value="Grade 3">Grade 3</option>
														<option value="Grade 4">Grade 4</option>
														<option value="Grade 5">Grade 5</option>
														<option value="Grade 6">Grade 6</option>
														<option value="Grade 7">Grade 7</option>
														<option value="Grade 8">Grade 8</option>
														<option value="Grade 9">Grade 9</option>
														<option value="Grade 10">Grade 10</option>
													</select>
													<input type="submit" value="Get">
												</form>

												<input type="search" id="mySearch3" style="width: 50%; margin: 2% 20%; color:black; border-radius:8px; border-color:#021F4E;
											 background-color:whitesmoke;" placeholder="Search student...">
												<table border="1" style="width:100%" class="table table-hover">
													<thead>
														<tr>
															<th>#</th>
															<th>Photo</th>
															<th>Name</th>
															<th>Subject</th>
															<th>Score</th>
															<th>Position</th>
															<th>Class Position</th>
														</tr>
													</thead>
													<tbody id="std_results">
													</tbody>
												</table>
											</div>
										</section>
									</div>
								</div>
								<script>
									//FETCHING LIST OF STUDENTS PER GRADE

									document.getElementById("get_students_form").addEventListener("submit", function(event) {
										event.preventDefault();
										var sn = 0;
										fetch('get_students.php', {
											method: 'POST',
											body: new FormData(document.getElementById("get_students_form"))
										}).then(res => res.json()).then(data => {
											if (data.length === 0) {
												alert("No student found for this grade");
											} else {
												const std_info = data.map(item => {
													sn++;
													return `<tr>
														<th scope="row">${sn}.</th>
														<th><img style="width:55px; height:43px;" class="rounded-circle"  src ="../uploads/${item.student_profile ? item.student_profile : 'no-image.png'}"></th>
														<td>${item.student_name}</td>
														<td>${item.student_gender}</td>
														<td>${item.student_parent}</td>
														<td>${item.student_phone}</td>
														<td>${item.student_town}</td>
													</tr>`;
												});
												document.getElementById("student_list").innerHTML = std_info.join('');
											}
										});
									});
									//FETCHING STUDENTS' RESULTS PER GRADE
									document.getElementById("students_results_form").addEventListener("submit", function(event) {
										event.preventDefault();

										var sn = 0;
										fetch('fetch_students_results.php', {
											method: 'POST',
											body: new FormData(document.getElementById('students_results_form'))
										}).then(res => res.json()).then(data => {
											if (data.length === 0) {
												alert("No student found for this grade");
											} else {
												const std_results = data.map(results => {
													sn++;
													return `<tr>
															<td rowspan="7">${sn}.</td>
															<td rowspan = "7"><img style="width:55px; height:43px;" class ="rounded-circle" src ="../uploads/${results.student_profile ? results.student_profile : 'no-image.png'}"></td>
															<td id="seacrh_name" rowspan="7">${results.student_name}</td>
															<td>Mathematics</td>
															<td>${results.Mathematics}%</td>
															<td>1st</td>
															<td rowspan="7"><span style="font-weight:bold;">7th</span></td>
														</tr>
														<tr>
															<td>English Language</td>
															<td>${results['English Language']}%</td>
															<td>7th</td>
														</tr>
														<tr>
															<td>Int. Science</td>
															<td>${results['Int Science']}%</td>
															<td>1st</td>
														</tr>
														<tr>
															<td>Social Studies</td>
															<td>${results['Social Studies']}%</td>
															<td>3rd</td>
														</tr>
														<tr>
															<td>French</td>
															<td>${results.French}%</td>
															<td>3rd</td>
														</tr>
														<tr>
															<td>OWOP</td>
															<td>${results.OWOP}%</td>
															<td>3rd</td>
														</tr>
														<tr>
															<td>ICT</td>
															<td>${results.ICT}%</td>
															<td>3rd</td>
												</tr>`;
												});
												document.getElementById("std_results").innerHTML = std_results.join('');
											}
										})
									});
								</script>
								<script src="js/cbpFWTabs.js"></script>
								<script>
									new CBPFWTabs(document.getElementById('tabs'));
								</script>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="custom-widgets">
							<div class="row-one">
								<div class="col-md-3 widget">
									<div class="stats-left ">
										<h5>Total</h5>
										<h4> Students</h4>
									</div>
									<div class="stats-right">
										<label><?php echo $all_students; ?></label>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="col-md-3 widget states-mdl">
									<div class="stats-left">
										<h5>Total</h5>
										<h4>Teachers</h4>
									</div>
									<div class="stats-right">
										<label><?php echo $all_teachers; ?></label>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="col-md-3 widget states-thrd">
									<div class="stats-left">
										<h5>Total</h5>
										<h4>Awards</h4>
									</div>
									<div class="stats-right">
										<label>0</label>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="col-md-3 widget states-last">
									<div class="stats-left">
										<h5>Total</h5>
										<h4>Graduates</h4>
									</div>
									<div class="stats-right">
										<label>0</label>
									</div>
									<div class="clearfix"> </div>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
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
									<div class="clearfix"></div>
								</div>
							</div>
							<!--/charts-inner-->
						</div>
						<!--//outer-wp-->
					</div>

					<footer>
						<p>&copy <?php echo date("Y") ?>. All Rights Reserved |</p>
					</footer>
				</div>
			</div>
			<div class="sidebar-menu">
				<header class="logo">
					<a href="#" class="sidebar-icon"><span class="fa fa-bars"></span></a><a href="#"><span id="logo">
							<h1><?php echo $admin_username ?></h1>
						</span>
						<!--<img id="logo" src="" alt="Logo"/>-->
					</a>
				</header>
				<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>

				<div class="down">
					<a href="#"><img src="images/profile_pic.jpg"></a>
					<span class=" name-caret"><?php echo $admin_username ?></span>
					<p>School Administrator</p>
					<ul>
						<li><a class="tooltips" href="#"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
						<li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
						<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
					</ul>
				</div>

				<div class="menu">
					<ul id="menu">
						<li><a href="#"><i class="fa fa-tachometer"></i> <span>DASHBOARD</span></a></li>
						<li id="menu-academico"><a href="#"><i class="fa fa-table"></i> <span>Students</span> <span class="fa fa-angle-right" style="float: right"></span></a>
							<ul id="menu-academico-sub">
								<li id="menu-academico-avaliacoes"><a href="#">Students Information</a></li>
								<li id="menu-academico-boletim"><a data-toggle="modal" data-target="#studentAdd" href="#">Add Student</a></li>
							</ul>
						</li>

						<li id="menu-academico"><a href="#"><i class="fa fa-file-text-o"></i> <span>Teacher</span> <span class="fa fa-angle-right" style="float: right"></span></a>

							<ul id="menu-academico-sub">
								<li id="menu-academico-avaliacoes"><a href="#section-2">Teacher Information</a></li>
								<li id="menu-academico-boletim"><a data-toggle="modal" data-target="#teacherAdd" href="#">Add Teacher</a></li>
							</ul>
						</li>
						<li id="menu-academico"><a href="#"><i class="lnr lnr-book"></i> <span>List</span> <span class="fa fa-angle-right" style="float: right"></span></a>
							<ul id="menu-academico-sub">
								<li id="menu-academico-avaliacoes"><a href="#">Exam List</a></li>
								<li id="menu-academico-boletim"><a href="#">Class Routine</a></li>
								<li id="menu-academico-boletim"><a href="#">Noticeboard</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
			<?php include "modals.php" ?>
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