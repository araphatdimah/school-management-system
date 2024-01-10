<?php 
session_start();
	if(!$_SESSION['t_name'] && !$_SESSION['t_pwd'])
	{
		header("location:index.php");
	}else{
		$t_name = $_SESSION['t_name'];
		$t_pwd = $_SESSION['t_pwd'];
		$t_id = $_SESSION['t_id'];

		include "../connection.php";
		$stmt = mysqli_prepare($con, "SELECT * FROM t_info WHERE t_name = ? AND t_pwd = ?");
		mysqli_stmt_bind_param($stmt, "ss", $t_name, $t_pwd);
		mysqli_stmt_execute($stmt);
		$info_raw = mysqli_stmt_get_result($stmt);
		$info_refined = mysqli_fetch_assoc($info_raw);
	}

	if(isset($_POST['change_password']))
	{
		include "../connection.php";

		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$stmt = mysqli_prepare($con, "SELECT * FROM t_info WHERE t_pwd = ? AND t_name = ?");
		mysqli_stmt_bind_param($stmt, "ss", $old_password, $t_name);
		mysqli_stmt_execute($stmt);
		$old_results = mysqli_stmt_get_result($stmt);
		$old_fetched = mysqli_fetch_assoc($old_results);
		$old_pwd = @$old_fetched['t_pwd'];
		
		if($old_password != $old_pwd)
		{ 
			echo "<script>alert('Old Password Does not Match');</script>";	
		}
		else
		{
			$stmt = mysqli_prepare($con, "UPDATE t_info 
			SET t_pwd = ? WHERE t_id = ? AND t_name = ?");
			mysqli_stmt_bind_param($stmt, "sis", $new_password, $t_id, $t_name);
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
	<title>Teacher Page</title>
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
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#mySearch").on("keyup",function(){
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function(){
          $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
        });
      });
    });
    </script>
	 <script>
    $(document).ready(function(){
    $("#mySearch2").on("keyup", function(){
        var value = $(this).val().toLowerCase().trim(); // Ensure trimmed lowercase value
        $("#myTable2 tr").each(function() {
            var rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.indexOf(value) > -1 || value === ""); // Toggle visibility based on match or empty value
        });
    });
});
    </script>
	<script>
    $(document).ready(function(){
    $("#mySearch3").on("keyup", function(){
        var value = $(this).val().toLowerCase().trim(); // Ensure trimmed lowercase value
        $("#myTable3 tr").each(function() {
            var rowText = $(this).text().toLowerCase();
            $(this).toggle(rowText.indexOf(value) > -1 || value === ""); // Toggle visibility based on match or empty value
        });
    });
});
    </script>
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
									if(($timeNow == 12 || $timeNow < 11) && $timeState == "am")
										{
											echo "Good morning, ", ucfirst($t_name);
	
										}elseif(($timeNow == 12 || $timeNow < 5) && $timeState =="pm")
										{
											echo "Good afternoon, ", ucfirst($t_name);
										}
										elseif($timeNow >= 5 && $timeState == "pm")
										{
											echo "Good evening, ", ucfirst($t_name);	
	
										}
									 ?> </h2>
								<div class="graph">
									<nav>
										<ul>
											<li><a href="#section-1" class="icon-shop"><i class="lnr lnr-briefcase"></i> <span>Information</span></a></li>
											<li><a href="#section-2" class="icon-cup"><i class="lnr lnr-lock"></i> <span>Change Password</span></a></li>
											<li><a href="#section-3" class="icon-food"><i class="fa fa-user" aria-hidden="true"></i> <span>Students</span></a></li>
											<li><a href="#section-4" class="icon-lab"><i class="fa fa-book"></i> <span>Add Results</span></a></li>
											<li><a href="#section-5" class="icon-truck"><i class="fa fa-book"></i> <span>Results</span></a></li>
										</ul>
									</nav>
									<div class="content tab">
										<section id="section-1">
											<div class="mediabox">
												<strong>Personal Information</strong>
												<p><strong>Town: </strong>
													<?php echo ucfirst($info_refined['t_town']); ?>
												</p>
												<p><strong>Qualification: </strong>
													<?php //echo ucfirst($info_refined['t_qualification']); ?>
												</p>
												<p><strong>Gender: </strong>
													<?php echo ucfirst($info_refined['t_gender']); ?>
												</p>
												<p> <strong>Date of Birth:</strong>
													<?php echo ($info_refined['t_dob']); ?>
												</p>

											</div>
											<div class="mediabox">
												<strong>Contact Details</strong>

												<p> <strong>Address:</strong>
													<?php echo ucfirst($info_refined['t_address']); ?>
												</p>
												<p> <strong>District:</strong>
													<?php echo ucfirst($info_refined['t_district']); ?>
												</p>
												<p> <strong>Email:</strong>
													<?php echo ($info_refined['t_email']); ?>
												</p>
											</div>
											<div class="mediabox">
												<strong>Parent's Details</strong>
												<p><strong>Father's Name: </strong>
													<?php //echo ucfirst($student_name_display['st_father']); ?>
												</p>
												<p><strong>Mother's Name: </strong>
													<?php //echo ucfirst($student_name_display['st_mother']); ?>
												</p>
												<p><strong>Parents' Contact: </strong>
													<?php //echo ucfirst($student_name_display['st_parents_contact']); ?>
												</p>
											</div>
										</section>
										<section id="section-2">
											<div class="col-md-12">
												
											<form method="post" action="teacher_home.php">
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
											<form id="student_list_form">
													<select style="width: 50%; margin: 0 20%;" id="gender" name="std_grade" type="text" required="">
														<option value="" selected disabled>--Select Grade</option>
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
														<input style="height:35px; margin-left:-20%;" type="submit" name="std_submit" value="Fetch">
													</form>
												<div class="graph">
															<div class="tables">
																<input type="search" id="mySearch" style="width: 50%; margin: 0 20%; color:black; border-color:#021F4E; 
																background-color:whitesmoke; border-radius:8px;" placeholder="Search student...">
																
																<table class="table table-hover"> 
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
																	<tbody id="myTable"> 		
																	
																	</tbody> 
																</table>
															</div>
												
													</div>
										</section>
										<section id="section-4">
											<form id="get_students_form">
												<select style="width: 50%; margin: 0 20%" id="grade1" name="student_grade" type="text" required>
													<option value="" selected disabled>--Select Grade</option>
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
													<input style="height:35%; margin-left:-20%;" type="submit" id="get1" name="get_student" value="Get">
												</form>
											<div class="graph">
											<input type="search" id="mySearch2" style="width: 50%; margin: 0 20%; color:black; border-radius:8px; border-color:#021F4E;
											 background-color:whitesmoke;" placeholder="Search student...">
											<div class="tables">
												<form id="add_students_results"> 
												<table id="scoreTable" class="table table-hover"> 
													<thead>
														<tr> 
															<th>#</th> 
															<th></th>
															<th><i class="fa fa-user"></i> Student</th> 
															<th>Score%</th>
														</tr> 
													</thead>
																	<tbody id="myTable2">
																		
																		</tbody> 
																	</table><br>
																	<select style="width: 50%; margin: 0 20%" id="grade" name="std_subject" type="text" required>
																				<option value="" selected disabled>--Select Subject</option>
																				<option value="Mathematics">Mathematics</option>
																				<option value="English Language">English Language</option>
																				<option value="Int Science">Int Science</option>
																				<option value="ICT">ICT</option>
																				<option value="Social Studies">Social Studies</option>
																				<option value="OWOP">OWOP</option>
																				<option value="French">French</option>
																			</select>
																	<input type="submit" style="height:35px" name="submit_results" id="results_submit" value="Submit Results">
																</form>
															</div>
														</div>
													</section>

											<section id="section-5">
												<form id="fetch_results_form">
													<select style="width: 50%; margin: 0 20%" id="grade3" name="student_grade3" type="text" required>
														<option value="" selected disabled>--Select Grade</option>
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
													<input style="height:35%; margin-left:-20%;" type="submit" id="get2" name="get_student1" value="Get">
												</form>
											<div class="graph">
											<input type="search" id="mySearch3" style="width: 50%; margin: 0 20%; color:black; border-radius:8px; border-color:#021F4E;
											 background-color:whitesmoke;" placeholder="Search student...">
														<div class="graph">
														<div class="tables">
															
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
																	<tbody id="myTable3">

															 		</tbody> 
																</table>
															</div>
														</div>
													</section>
												</div>
											</div>
										</div>
		<script>
			//FETCHING STUDENTS' LIST
			document.getElementById("student_list_form").addEventListener("submit", function(event){
				event.preventDefault();
				var sn = 0;
				fetch('student_list.php', {
					method: 'Post',
					body: new FormData(document.getElementById('student_list_form'))
				}).then(res => res.json()).then(
					data =>{
						if(data.length === 0){
							alert("No Student Found!");
						}else{
						const student_list = data.map(student =>{
							sn++;
							return `<tr>
									<th>${sn}</th>
									<th></th>
									<td>${student.student_name}</td>
									<td>${student.student_gender}</td>
									<td>${student.student_parent}</td>
									<td>${student.student_phone}</td>
									<td>${student.student_town}</td>
									</tr>`;
						});
						document.getElementById("myTable").innerHTML = student_list.join('');
						}
					});
			});
		//GETTING STUDENTS FROM SERVER TO UPDATE THEIR RESULTS
			document.getElementById("get_students_form").addEventListener("submit", function(event) {
			event.preventDefault();
			var sn = 0;
		fetch('get_students.php', {
			method: 'POST',
			body: new FormData(document.getElementById("get_students_form"))
		}).then(res =>res.json()).then(data =>{
			if(data.length ===0){
				alert("No Student Found!");
			}else{
		const rows = data.map(item =>{
			sn++;
				return `<tr>
							<th scope="row">${sn}</th>
							<td><input type="hidden" name="std_id[]" value="${item.student_id}"></td>
							<td><input type="hidden" name="std_name[]" value = "${item.student_name}">${item.student_name}</td> 
							<td><input name="std_score[]" type="number" placeholder="Enter score"></td> 
						</tr>`;
						
		});
		document.getElementById("myTable2").innerHTML = rows.join('');
			}
		}).catch(error =>{
			alert("Not good");
		})	
		});
		

		//ADDING STUDENTS' RESULTS
		document.getElementById("add_students_results").addEventListener("submit", function(event) {
    		event.preventDefault();

    		const formData = new FormData(document.getElementById("add_students_results"));

			fetch('add_results.php', {
				method: 'POST',
				body: formData
			})
			.then(response => {
				if (!response.ok) {
					throw new Error('Network response was not ok');
				}
				return response.text();
			})
			.then(data => {
				console.log(data);
				alert("Results uploaded successfully");
			})
			.catch(error => {
				alert("There was an error: " + error.message);
			});
	});
	//FETCHING STUDENTS RESULTS PER GRADE
	document.getElementById("fetch_results_form").addEventListener("submit", function(event){
		event.preventDefault();
		var sn = 0;
		fetch('fetch_students_results.php',{
			method: 'POST',
			body: new FormData(document.getElementById("fetch_results_form"))
		}).then(res => res.json()).then(data =>{
			// console.log(data);
			if(data.length ===0){
				alert("No results found for this grade.");
			}else{

				const results = data.map(item =>{
					sn++;
					return `<tr>
								<td rowspan="7">${sn}</td>
								<td rowspan="7">${item.student_name}</td>
								<td>Mathematics</td>
								<td>${item.Mathematics}%</td>
								<td>1st</td>
								<td rowspan="7"><span style="font-weight:bold;">7th</span></td>
							</tr>
							<tr>
								<td>English Language</td>
								<td>${item['English Language']}%</td>
								<td>7th</td>
							</tr>
							<tr>
								<td>Int. Science</td>
								<td>${item['Int Science']}%</td>
								<td>1st</td>
							</tr>
							<tr>
								<td>Social Studies</td>
								<td>${item['Social Studies']}%</td>
								<td>3rd</td>
							</tr>
							<tr>
								<td>French</td>
								<td>${item.French}%</td>
								<td>3rd</td>
							</tr>
							<tr>
								<td>OWOP</td>
								<td>${item.OWOP}%</td>
								<td>3rd</td>
							</tr>
							<tr>
								<td>ICT</td>
								<td>${item.ICT}%</td>
								<td>3rd</td>
							</tr>`;
				});
				document.getElementById("myTable3").innerHTML = results.join('');
			}
		}).catch(error =>{
			alert(error.message);
		})
	});
</script>
							<script src="js/cbpFWTabs.js"></script>
							<script>
								new CBPFWTabs(document.getElementById('tabs'));
							</script>
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
								<div class="clearfix"> </div>
							</div>
						</div>
					</div>
				</div>
				<footer>
					<p>&copy <?php echo  date("Y") ?>. All Rights Reserved | </p>
				</footer>
			</div>
		</div>
		<div class="sidebar-menu">
			<header class="logo">
				<a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="index.php"> <span id="logo"> <h1><?php echo $t_name; ?></h1></span> 
					<!--<img id="logo" src="" alt="Logo"/>--> 
				  </a>
			</header>
			<div style="border-top:1px solid rgba(69, 74, 84, 0.7)"></div>
			
			<div class="down">
				<a href="#"><img src="images/admin.jpg"></a>
				<a href="#"><span class=" name-caret"><?php echo $t_name; ?></span></a>
				<p>Teacher</p>
				<ul>
					<li><a class="tooltips" href="#"><span>Profile</span><i class="lnr lnr-user"></i></a></li>
					<li><a class="tooltips" href="#"><span>Settings</span><i class="lnr lnr-cog"></i></a></li>
					<li><a class="tooltips" href="logouts.php"><span>Log out</span><i class="lnr lnr-power-switch"></i></a></li>
				</ul>
			</div>
			<!--//down-->
			<div class="menu">
				<ul id="menu">
					<li><a href="#"><i class="fa fa-tachometer"></i> <span>Dashboard</span></a></li>
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