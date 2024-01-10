<?php
session_start();

if(isset($_POST['student_submit'])){
    
	include "connection.php";
  
	$student_name = $_POST['student_name'];
	$student_dob = $_POST['student_dob'];
	$student_gender = $_POST['student_gender'];
	$student_parent = $_POST['student_parent'];
	$student_grade = $_POST['student_grade'];
	$student_phone = $_POST['student_phone'];
	$student_address = $_POST['student_address'];
	$student_town = $_POST['student_town'];
	$student_pwd = $_POST['student_pwd'];
	$student_confirm_pwd = $_POST['student_confirm_pwd'];
  
  $stmt = mysqli_prepare($con, "INSERT INTO student_info
  (student_name, student_dob, student_gender, student_parent, student_grade, student_phone, student_address, student_town, student_pwd)
   VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
		  mysqli_stmt_bind_param($stmt, "sssssssss", 
  $student_name, $student_dob, $student_gender, $student_parent, $student_grade, $student_phone, $student_address, $student_town, $student_confirm_pwd);
		  if ( mysqli_stmt_execute($stmt)){
			  echo "<script>alert('Staff, $student_name has been added successfully.');</script>";
			   echo "<script>window.location.href ='index.php';</script>";
	} 
	  else {
				  //echo "MySQL Error: " . mysqli_error($con);
				  //die;
				echo "<script>alert('Error! Please cross-check your data.');</script>";
				
			  }
		} 

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Home Page</title>
<!-- Meta tag Keywords -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Scholarly web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--// Meta tag Keywords -->
<!-- css files -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="css/bootstrap.css"> <!-- Bootstrap-Core-CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" /> <!-- Style-CSS --> 
<link rel="stylesheet" href="css/font-awesome.css"> <!-- Font-Awesome-Icons-CSS -->
<link rel="stylesheet" href="css/swipebox.css">
<link rel="stylesheet" href="css/jquery-ui.css" />
<!-- //css files -->
<!-- online-fonts -->
<link href="//fonts.googleapis.com/css?family=Exo+2:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&amp;subset=cyrillic,latin-ext" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;subset=latin-ext" rel="stylesheet">
<!-- //online-fonts -->
</head>
<body>
<!-- banner -->
<div class="main_section_agile" id="home">
	<div class="agileits_w3layouts_banner_nav">
		<nav class="navbar navbar-default">
			<div class="navbar-header navbar-left">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			<h1><a class="navbar-brand" href="index.php"><i class="fa fa-leanpub" aria-hidden="true"></i> Sika Nko</a></h1>

			</div>
			<div class="w3layouts_header_right">
			    <form action="#" method="post">
					<input name="Search here" type="search" placeholder="Search" required="">
					<input type="submit" value="">
				</form>
			</div>
			<ul class="agile_forms">
				<li><a class="active" href="students/index.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Sign In now</a> </li>
			<!--	<li><a href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Sign Up</a> </li> -->
			</ul>
			
			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
				<nav class="link-effect-2" id="link-effect-2">
					<ul class="nav navbar-nav">
						<li class="active"><a href="index.php" class="effect-3">Home</a></li>
						<li><a href="#about" class="effect-3 scroll">About Us</a></li>
						<li><a href="#services" class="effect-3 scroll">Services</a></li>
						<li><a href="#team" class="effect-3 scroll">Staff</a></li>
						<li><a href="#gallery" class="effect-3 scroll">Gallery</a></li>
						<li><a href="#mail" class="effect-3 scroll">Mail Us</a></li>
					</ul>
				</nav>

			</div>
		</nav>	
		<div class="clearfix"> </div> 
	</div>
</div>
<!-- banner -->
<div class="about-bottom">
	<div style="height: 125.75vh; background-color:whitesmoke;" class="col-md-6 w3l_about_bottom_left">
		<div class="video-grid-single-page-agileits">
			<div data-video="oE4i15n-Nik" id="video"> <img style="height: 90vh;" src="images/Nko6.jpg" alt="" class="img-responsive" /> </div>
		</div>
		<div class="w3l_about_bottom_left_video">
			<h4 style="background-color:black; color:orange; margin-top:25%;">Watch Us Here</h4>
		</div>
	</div>
	<div class="col-md-6 w3l_about_bottom_right one">
		<div class="abt-w3l">
			<div class="header-w3l">
				<h2>Admission Form</h2>
				<h4>Fill Out the Form Below</h4>
				<form action="#" method="post" class="mod2">
					<div class="col-md-6 col-xs-6 w3l-left-mk">
						<ul>
							<li class="text">Name of Student :  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><input name="student_name" type="text" required=""></li>
							<li class="text">Date of Birth :  </li>
							<li class="agileits-main"><i class="fa fa-calendar" aria-hidden="true"></i><input class="date" id="datepicker" name="student_dob" type="text" value="" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'mm/dd/yyyy';}" required="" /></li>
							<li class="text">Name of Parent  :  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><input name="student_parent" type="text" required=""></li>
							<li class="text">Gender  :  </li>
							<li class="agileits-main"><i class="fa fa-user-o" aria-hidden="true"></i><select name="student_gender" type="text" required="">
								<option selected disabled>--Select Gender</option>
								<option>Male</option>
								<option>Female</option>
								<option>Other</option>
							</select></li>
							<li class="text">Grade : </li>
							<li class="agileits-main"><i class="fa fa-user" aria-hidden="true"></i><select id="gender" name="student_grade" type="text" required="">
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
							</select></li>
						</ul>
					</div>
					<div class="col-md-6 col-xs-6 w3l-right-mk">
						<ul>
							<li class="text">Home Mobile no  :  </li>
							<li class="agileits-main"><i class="fa fa-phone" aria-hidden="true"></i><input name="student_phone" type="text" maxlength="10" required=""></li>
							<li class="text">Address  :  </li>
							<li class="agileits-main"><i class="fa fa-home" aria-hidden="true"></i><input name="student_address" type="text" required=""></li>
							<li class="text">Town  :  </li>
							<li class="agileits-main"><i class="fa fa-map-marker" aria-hidden="true"></i><input name="student_town" type="text" required=""></li>
							<li class="text">Password : </li>
							<li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input id="pwd" name="student_pwd" type="password" required=""></li>
							<li class="text">Confirm Password : </li>
							<li class="agileits-main"><i class="fa fa-lock" aria-hidden="true"></i><input id="pwd" name="student_confirm_pwd" type="password" required=""></li>
						</ul>
					</div>
					<div class="clearfix"></div>
					<div class="agile-submit">
						<input type="submit" name="student_submit" value="submit">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- //banner -->
<!-- Modal1 
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				
				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Sign In</h3>	
					<div class="login-form">
						<form  method="post">
							<input type="text" name="st_username" placeholder="Enter Your Username" required="">
							<input type="password" name="st_password" placeholder="Password" >
							<div class="tp">
								<input type="submit" value="Sign In" name="student_signin">
							</div>
						</form>
					</div>
					<div class="login-social-grids">
						<ul>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
					<p><a href="#" data-toggle="modal" data-target="#myModal3" > Don't have an account?</a></p>
				</div>
				
			</div>
		</div>
	</div>
</div>
//Modal1 -->	
	
	
<!-- Modal2 -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog">
	<div class="modal-dialog">
	<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			<!--
				<div class="signin-form profile">
					<h3 class="agileinfo_sign">Sign Up</h3>	
					<div class="login-form">
						<form method="post" >
						   <input type="text" name="username" placeholder="Username" required="">
							<input type="email" name="email" placeholder="Email" required="">
							<input type="password" name="password" placeholder="Password" required="">
							<select class="form-control" name="grade" required="">
							
								<option class="select_grade">
								Select Class
								</option>
							
								
								
							</select>
							<input type="submit" value="Sign Up" name="student_signup">
						</form>
					</div>
					<p><a href="#"> By clicking Sign Up, I agree to your terms</a></p>
				</div>
				-->
			</div>
		</div>
	</div>
</div>
<div class="clearfix"> </div> 
<!-- //Modal2 -->	
<!-- about -->
<div class="about-top" id="about">
	<div class="container">
		<h3 class="w3l-title">About Us</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="col-md-7 wthree-services-bottom-grids">
			<div class="wthree-services-left">
				<img style="width:100%" src="images/Nko4.jpg" alt="">
			</div>
			<!-- <div class="wthree-services-right">
				<img src="images/ab2.jpg" alt="">
			</div> -->
			<div class="clearfix"> </div>
		</div>
		<div style="background-color: orange; height:70vh" class="col-md-5 wthree-about-grids">
			<h4 style="color: wheat;">Welcome to Our School</h4>
			<a href="#" class="trend-w3l" data-toggle="modal" data-target="#myModal"><span>Read More</span></a>
			<a href="#mail" class="trend-w3l scroll"><span>Get In Touch</span></a>
		</div>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- modal -->
<div class="modal about-modal w3-agileits fade" id="myModal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
			</div> 
			<div class="modal-body">
				<img src="images/Nko5.jpg" alt=""> 
				<p>This is Sika Nko Prepratory School. We run Grade 1 to Grade 10. We have experienced and well qualified tutors handling our pupils.</p>
			</div> 
		</div>
	</div>
</div>
<!-- //modal --> 
<!-- //about -->
<!--stats-->
<div class="stats" id="stats">
	<div class="container">
		<div class="stats-info">
			<div class="col-md-5 col-xs-7 stats-grid slideanim">
				<i class="fa fa-user" aria-hidden="true"></i>
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='500' data-delay='10.60' data-increment="1">500</div>
				
				<h4 class="stats-info">STUDENTS ENROLLED</h4>
			</div>
			<div class="col-md-5 col-xs-5 stats-grid slideanim">
					<i class="fas fa-chalkboard-teacher" aria-hidden="true"></i>
				<div class='numscroller numscroller-big-bottom' data-slno='1' data-min='0' data-max='600' data-delay='10.60' data-increment="1">600</div>
			
				<h4 class="stats-info">TEACHERS</h4>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!--//stats-->
<!-- services -->
<div class="services" id="services" >
	<div class="container">  
		<h3 class="w3l-title">Our Services</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="services-w3ls-row">
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<span class="fa fa-graduation-cap" aria-hidden="true"></span>
				<h6>01</h6>
				<h5>Scholarship Facility</h5>
				<p>Itaque earum rerum hic a sapiente delectus in auctor sapien. Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>
			</div>
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<h6>02</h6>
				<h5>Skilled Lecturers</h5>
				<p>Itaque earum rerum hic a sapiente delectus in auctor sapien. Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>
				<span class="fa fa-user-o grid-w3l-ser" aria-hidden="true"></span>
			</div>
			<div class="col-xs-4 services-grid agileits-w3layouts">
				<span class="fa fa-book" aria-hidden="true"></span>
				<h6>03</h6>
				<h5>Book Library & Store</h5>
				<p>Itaque earum rerum hic a sapiente delectus in auctor sapien. Itaque earum rerum hic a sapiente delectus in auctor sapien.</p>
			</div> 
			<div class="clearfix"> </div>
		</div>  
	</div>
</div>
<!-- //services -->
<!-- Gallery -->
<section class="portfolio-w3ls" id="gallery">
		<h3 class="w3l-title">Our Gallery</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko1.jpg" class="swipebox"><img src="images/Nko1.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko2.jpg" class="swipebox"><img src="images/Nko2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko4.jpg" class="swipebox"><img src="images/Nko4.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g7.jpg" class="swipebox"><img src="images/g7.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko5.jpg" class="swipebox"><img src="images/Nko5.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
					</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko6.jpg" class="swipebox"><img src="images/Nko6.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko3.png" class="swipebox"><img src="images/Nko3.png" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g8.jpg" class="swipebox"><img src="images/g8.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
					   </div>
				   </a>
				</div>
					<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko9.png" class="swipebox"><img src="images/Nko9.png" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko10.png" class="swipebox"><img src="images/Nko10.png" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/Nko2.jpg" class="swipebox"><img src="images/Nko2.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="col-md-3 col-xs-3 gallery-grid gallery1">
					<a href="images/g12.jpg" class="swipebox"><img src="images/g12.jpg" class="img-responsive" alt="/">
						<div class="textbox">
						<h4>Sika Nko</h4>
							<p><i class="fa fa-picture-o" aria-hidden="true"></i></p>
						</div>
				</a>
				</div>
				<div class="clearfix"> </div>
</section>
<!-- //gallery -->
<!-- team -->
<div class="team-w3l" id="team">
	<div class="container">
		<h3 class="w3l-title">Our Skilled Tutors</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="team-w3l-grid">
			<div class="col-md-4 col-xs-4 about-poleft t1">
				<div class="about_img"><img src="images/t1.jpg" alt="">
				  <h5>Awudu Manaf</h5>
				  <div class="about_opa">
					<p>Professor, Awudu Manaf. He's the head of mathematics.
						He's married to two wives.
					</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t2">
				<div class="about_img"><img src="images/t2.jpg" alt="">
				  <h5>Darponia</h5>
				  <div class="about_opa">
				  <p>Professor, Darponia. He's the head of mathematics.
						He's married to two wives.
					</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t3">
				<div class="about_img"><img src="images/t3.jpg" alt="">
				  <h5>Stephen</h5>
				  <div class="about_opa">
				  <p>Professor, Stephen. He's the head of mathematics.
						He's married to two wives.
					</p>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="team-w3l-grid grid-2-team">
			<div class="col-md-4 col-xs-4 about-poleft t1">
				<div class="about_img"><img src="images/t4.jpg" alt="">
				  <h5>Cynthia</h5>
				  <div class="about_opa">
				  <p>Dr., Cynthia. She's the head of mathematics.
						He's married to two wives.
					</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t2">
				<div class="about_img"><img src="images/t5.jpg" alt="">
				  <h5>Mohammed</h5>
				  <div class="about_opa">
				  <p>PhD, Mohammed. He's the head of mathematics.
						He's married to two wives.
					</p>
				  </div>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 about-poleft t3">
				<div class="about_img"><img src="images/t6.jpg" alt="">
				  <h5>Austin</h5>
				  <div class="about_opa">
				  <p>Professor, Austin. She's the head of mathematics.
						He's married to two wives.
					</p>
				  </div>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
	<?php
	 include "setting/config.php";
	$general = $ravi->general_setting_check();
	
	$general_fetch = $general->fetch_assoc();
	$general_numss = $general->num_rows;
	if($general_numss>0)
	{
	?>
<div id="mail" class="contact">
	<div class="container">
		<h3 class="w3l-title">Mail Us</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="agile_banner_bottom_grids">
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agilew3_contact">
					<h4>Address</h4>
					<p> Sika Nko, Volta Region<?php //echo $general_fetch['website_address']; ?></p>
					<p>Ghana</p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left">
					<i class="fa fa-mobile" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right">
					<h4>Phone</h4>
					<p>0545352734 Or 0206458690 <?php //echo $general_fetch['website_phone1']; ?> <span><?php //echo $general_fetch['website_phone2']; ?></span></p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left1">
					 <i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right1">
					<h4>Email</h4>
					<p><a href="mailto:info@example.com">sikanko@gmail.com<?php //echo $general_fetch['website_email1']; ?></a>
						</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="w3l-form">
			<h3 class="w3l-title">Get In Touch</h3>
			<div class="contact-grid1">
				<div class="contact-top1">
					<form action="#" method="post">
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Name*</label>
							<input type="text" name="Name" placeholder="Name" required="">
							<label>E-mail*</label>
							<input type="email" name="E-mail" placeholder="E-mail" required="">
						</div>
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Phone Number*</label>
							<input type="text" name="number" placeholder="Phone Number" required="">
							<label>Subject*</label>
							<input type="text" name="subject" placeholder="Subject" required="">
						</div>
						<div class="form-group">
							<label>Message*</label>
							<textarea placeholder name="Message" required=""></textarea>
						</div>
							<input type="submit" value="Send">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="map"></div>
<div class="footer">
	<div class="container">
		<div class="wthree_footer_grid_left">
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>About Us</h4>
				<p>This is Sika Nko Prepratory School. We run Grade 1 to Grade 10. We have experienced and well qualified tutors handling our pupils.</p>
			</p>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>Navigation</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="index.html">Home</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#about" class="scroll">About Us</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#services" class="scroll">Services</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#team" class="scroll">Team</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#gallery" class="scroll">Gallery</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#mail" class="scroll">Mail Us</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 w3l-3">
				<h4>Others</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Media</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 wthree_footer_grid_right1">
				<h4>Contact Us</h4>
				<ul>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@example.com"><?php echo $general_fetch['website_email1']; ?></a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo $general_fetch['website_phone1']; ?></li>
					<li><i class="fa fa-fax" aria-hidden="true"></i><?php echo $general_fetch['website_address']; ?></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="w3layouts_copy_right">
	<div class="container">
		<p>&copy; <?php echo date("Y") ?> - All rights reserved |</p>
	</div>
</div>
	<?php } else{ ?>

	<div id="mail" class="contact">
	<div class="container">
		<h3 class="w3l-title">Mail Us</h3>
		<div class="w3layouts_header">
			<p><i class="fa fa-graduation-cap" aria-hidden="true"></i></p>
		</div>
		<div class="agile_banner_bottom_grids">
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agilew3_contact">
					<h4>Address</h4>
					<p><?php echo "Enter Your Business Address"; ?></p>
					<p></p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left">
					<i class="fa fa-mobile" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right">
					<h4>Phone</h4>
					<p><?php echo "Enter Your Business Email"; ?> <span><?php echo "Phone"; ?></span></p>
				</div>
			</div>
			<div class="col-md-4 col-xs-4 w3_agile_contact_grid">
				<div class="agile_contact_grid_left agileits_w3layouts_left1">
					 <i class="fa fa-envelope-o" aria-hidden="true"></i>
				</div>
				<div class="agile_contact_grid_right agileits_w3layouts_right1">
					<h4>Email</h4>
					<p><a href="mailto:info@example.com"><?php echo "Business Email"; ?></a>
						<span><a href="mailto:info@example.com"><?php echo "Email 2"; ?></a></span></p>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
		<div class="w3l-form">
			<h3 class="w3l-title">Get In Touch</h3>
			<div class="contact-grid1">
				<div class="contact-top1">
					<form action="#" method="post">
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Name*</label>
							<input type="text" name="Name" placeholder="Name" required="">
							<label>E-mail*</label>
							<input type="email" name="E-mail" placeholder="E-mail" required="">
						</div>
						<div class="col-md-6 col-xs-6 wthree_contact_left_grid">
							<label>Phone Number*</label>
							<input type="text" name="number" placeholder="Phone Number" required="">
							<label>Subject*</label>
							<input type="text" name="subject" placeholder="Subject" required="">
						</div>
						<div class="form-group">
							<label>Message*</label>
							<textarea placeholder name="Message" required=""></textarea>
						</div>
							<input type="submit" value="Send">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="map"></div>

<div class="footer">
	<div class="container">
		<div class="wthree_footer_grid_left">
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>About Us</h4>
				<p>This is Sika Nko Prepratory School. We run Grade 1 to Grade 10. We have experienced and well qualified tutors handling our pupils.</p>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1">
				<h4>Navigation</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="index.html">Home</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#about" class="scroll">About Us</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#services" class="scroll">Services</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#team" class="scroll">Team</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#gallery" class="scroll">Gallery</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#mail" class="scroll">Mail Us</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 w3l-3">
				<h4>Others</h4>
				<ul>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Media</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Mobile Apps</a></li>
					<li><i class="fa fa-angle-double-right" aria-hidden="true"></i><a href="#">Privacy Policy</a></li>
				</ul>
			</div>
			<div class="col-md-3 col-xs-3 wthree_footer_grid_left1 wthree_footer_grid_right1">
				<h4>Contact Us</h4>
				<ul>
					<li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="mailto:info@example.com"><?php echo $general_fetch['website_email1']; ?></a></li>
					<li><i class="fa fa-phone" aria-hidden="true"></i><?php echo "Business Phone No"; ?></li>
					<li><i class="fa fa-fax" aria-hidden="true"></i><?php echo "Business Address"; ?></li>
				</ul>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
</div>
<div class="w3layouts_copy_right">
	<div class="container">
		<p>&copy; <?php echo date("Y") ?>. All rights reserved |</p>
	</div>
</div>
	<?php }?>
<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap --> 
<!-- //js-files -->
<!-- Baneer-js -->

<!-- Map-JavaScript -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLBAsAnFqgia1yl8Le56zIxUr-7hj8CDE"></script>        
			<script type="text/javascript">
				google.maps.event.addDomListener(window, 'load', init);
				function init() {
					var mapOptions = {
						zoom: 11,
						center: new google.maps.LatLng(6.700071, -1.630783),
						styles: [{"featureType":"all","elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#000000"},{"lightness":40}]},{"featureType":"all","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#000000"},{"lightness":16}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":17},{"weight":1.2}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":20}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":21}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#000000"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#000000"},{"lightness":29},{"weight":0.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":16}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":19}]},{"featureType":"water","elementType":"geometry","stylers":[{"color":"#000000"},{"lightness":17}]}]
					};
					var mapElement = document.getElementById('map');
					var map = new google.maps.Map(mapElement, mapOptions);
					var marker = new google.maps.Marker({
						position: new google.maps.LatLng(6.700071, -1.630783),
						map: map
					});
				}
			</script>

<!-- smooth scrolling -->
<script src="js/SmoothScroll.min.js"></script>
<!-- //smooth scrolling -->
<!-- stats -->
<script type="text/javascript" src="js/numscroller-1.0.js"></script>
<!-- //stats -->
<!-- moving-top scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //moving-top scrolling -->
<!-- gallery popup -->
<script src="js/jquery.swipebox.min.js"></script> 
<script type="text/javascript">
jQuery(function($) {
	$(".swipebox").swipebox();
});
</script>
<!-- //gallery popup -->
<!--/script-->
	<script src="js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
<!-- //Baneer-js -->
<!-- Calendar -->
<script src="js/jquery-ui.js"></script>
	<script>
	  $(function() {
		$( "#datepicker" ).datepicker();
	 });
	</script>
<!-- //Calendar -->	

<!-- //js-scripts -->
</body>
</html>