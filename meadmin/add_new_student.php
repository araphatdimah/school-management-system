<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	include "../connection.php";

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
	$student_profile = $_FILES['student_profile'];

	$image_name = $student_profile['name'];
	$image_temp = $student_profile['tmp_name'];
	$image_path = "../uploads/".$image_name;
	move_uploaded_file($image_temp, $image_path);

	$already_stmt = mysqli_prepare($con, "SELECT * FROM student_info WHERE student_name = ?");
	mysqli_stmt_bind_param($already_stmt, "s", $student_name);
	mysqli_stmt_execute($already_stmt);
	$already = mysqli_stmt_get_result($already_stmt);

	if ($student_pwd === $student_confirm_pwd) {
		if (mysqli_num_rows($already) > 0) {
			$already_present = ['present' => $student_name . ', has been registered already'];
			echo json_encode($already_present);
		} else {
			$stmt = mysqli_prepare($con, "INSERT INTO student_info
				(student_name, student_dob, student_gender, student_parent, student_grade, student_phone, student_address, student_town, student_pwd, student_profile)
				 VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
			mysqli_stmt_bind_param(
				$stmt,
				"ssssssssss",
				$student_name,
				$student_dob,
				$student_gender,
				$student_parent,
				$student_grade,
				$student_phone,
				$student_address,
				$student_town,
				$student_confirm_pwd,
				$image_path
			);
			if (mysqli_stmt_execute($stmt)) {
				$add = ['added' => 'Student, ' . $student_name . ' has been added successfully.'];
				echo json_encode($add);
			} else {
				//echo "MySQL Error: " . mysqli_error($con);
				//die;
				$check = ['check' => 'Error! Please cross-check your data.'];
				echo json_encode($check);
			}
		}
	} else {
		$err = ['mismatch' => 'Error! Passwords mismatch'];
		echo json_encode($err);
	}
}
