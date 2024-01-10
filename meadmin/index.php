<?php
session_start();

include "../connection.php";

if (isset($_POST['admin_signin'])) {
	$username = $_POST['admin_username'];
	$pwd = $_POST['admin_password'];

	$stmt = mysqli_prepare($con, "SELECT * FROM meadmin where admin_username = ? AND admin_password = ?");
	mysqli_stmt_bind_param($stmt, "ss", $username, $pwd);
	mysqli_stmt_execute($stmt);
	$admin_results  = mysqli_stmt_get_result($stmt);
	$admin_info = mysqli_fetch_assoc($admin_results);

	$stmt1 = mysqli_prepare($con, "SELECT * FROM t_info where t_name = ? AND t_pwd = ?");
	mysqli_stmt_bind_param($stmt1, "ss", $username, $pwd);
	mysqli_stmt_execute($stmt1);
	$teacher_results  = mysqli_stmt_get_result($stmt1);
	$teacher_info = mysqli_fetch_assoc($teacher_results);

	if (mysqli_num_rows($admin_results) > 0) {
		$_SESSION['admin_username'] = 	$username;
		$_SESSION['admin_password'] = $pwd;
		$_SESSION['admin_id'] = $admin_info['admin_id'];
		$_SESSION['admin_phone'] = $admin_info['admin_phone'];
		$_SESSION['admin_gender'] = $admin_info['admin_gender'];
		$_SESSION['admin_email'] = $admin_info['admin_email'];
		$_SESSION['admin_address'] = $admin_info['admin_address'];
		$_SESSION['admin_parent'] = $admin_info['admin_parent'];
		$_SESSION['admin_parent_phone'] = $admin_info['admin_parent_phone'];
		header("location:home.php");
		exit();
	} elseif (mysqli_num_rows($teacher_results) > 0) {
		$_SESSION['t_name'] = 	$username;
		$_SESSION['t_pwd'] = $pwd;
		$_SESSION['t_id'] = $teacher_info['t_id'];
		header("location:teacher_home.php");
		exit();
	} else {
		echo "<script>alert('Wrong email or password.');</script>";
		echo "<script>window.location.href = index.php;</script>";
	}
}
?>
<!DOCTYPE HTML>
<html>

<head>
	<title>Admin Login Page</title>
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
	<!-- Bootstrap Core CSS -->
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
	<!--clock init-->
</head>

<body>
	<div style="background-color: white;" class="error_page">

		<div style="background-color: whitesmoke;" class="error-top">

			<h2 style="color: #3b5998; font-size:2.8rem; margin: 5% -8%;" class="inner-tittle page">Official Login</h2>

			<div class="login">
				<h3 class="inner-tittle t-inner">Login</h3>
				<form method="post">
					<input type="text" class="text" name="admin_username" placeholder="Username">
					<input type="password" placeholder="Password" name="admin_password">
					<div class="submit"><input type="submit" value="Login" name="admin_signin"></div>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
	<div class="footer">
		<div class="error-btn">
			<a class="read fourth" href="../index.php">Return Home</a>
		</div>
		<p>&copy <?php echo date("Y"); ?>. All Rights Reserved |</p>
	</div>

	<script src="js/jquery.nicescroll.js"></script>
	<script src="js/scripts.js"></script>
	<!-- Bootstrap Core JavaScript -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>