<?php
session_start();

include "../connection.php";

if (isset($_POST['student_signin'])) {
	$st_username = $_POST['st_username'];
	$st_password = $_POST['st_password'];

	$stmt = mysqli_prepare($con, "SELECT * FROM student_info WHERE student_name = ? AND student_pwd = ?");
	mysqli_stmt_bind_param($stmt, "ss", $st_username, $st_password);
	mysqli_stmt_execute($stmt);
	$st_results  = mysqli_stmt_get_result($stmt);
	$st_results1 = mysqli_fetch_assoc($st_results);

	if (mysqli_num_rows($st_results) > 0) {
		$_SESSION['st_username'] = 	$st_username;
		$_SESSION['st_password'] = $st_password;
		$_SESSION['st_grade'] = $st_results1['student_grade'];
		$_SESSION['st_id'] = $st_results1['student_id'];
		$_SESSION['st_profile'] = $st_results1['student_profile'];
		header("location:home.php");
	} else {
		echo "<script>alert('Wrong email or password.');</script>";
		echo "<script>window.location.href = index.php;</script>";
	}
}

?>

<!DOCTYPE HTML>
<html>

<head>
	<title>Student Login</title>
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
	<!--clock init-->
</head>

<body>

	<div style="background-color:white" class="error_page">
		<div style="background-color: whitesmoke;" class="error-top">
			<h2 style="margin: 5% -8%; color: #3b5998; font-size:2.5rem" class="inner-tittle page">Student Login</h2>
			<div class="login">
				<h3 class="inner-tittle t-inner">Login</h3>
				<form method="post">
					<input type="text" class="text" name="st_username" placeholder="Username" required>
					<input type="password" placeholder="Password" name="st_password" required>
					<div class="submit"><input type="submit" value="Login" name="student_signin"></div>
					<div class="clearfix"></div>

					<div class="new">
						<p><label class="checkbox11"><input type="checkbox" name="checkbox"><i></i>Forgot Password ?</label></p>
						<div class="clearfix"></div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="error-btn">
			<a class="read fourth" href="../index.php">Return Home</a>
		</div>
		<p>&copy <?php echo date("Y") ?>. All Rights Reserved |</p>
	</div>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>