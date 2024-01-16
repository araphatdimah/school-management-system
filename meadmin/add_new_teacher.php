<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        include "../connection.php";

        $t_name = $_POST['t_name'];
        $t_dob = $_POST['t_dob'];
        $t_gender = $_POST['t_gender'];
        $t_subject = $_POST['t_subject'];
        $t_grade = $_POST['t_grade'];
        $t_email = $_POST['t_email'];
        $t_phone = $_POST['t_phone'];
        $t_address = $_POST['t_address'];
        $t_district = $_POST['t_district'];
        $t_town = $_POST['t_town'];
        $t_pwd = $_POST['t_pwd'];
        $confirm_pwd = $_POST['confirm_pwd'];
        $t_profile = $_FILES['t_profile'];

        $image_name = $t_profile['name'];
        $image_temp = $t_profile['tmp_name'];
        $image_path = "../uploads/".$image_name;
        move_uploaded_file($image_temp, $image_path);

        $already_stmt = mysqli_prepare($con, "SELECT * FROM t_info WHERE t_name = ?");
        mysqli_stmt_bind_param($already_stmt, "s", $t_name);
        mysqli_stmt_execute($already_stmt);
        $already = mysqli_stmt_get_result($already_stmt);

        if ($t_pwd === $confirm_pwd) {

                if (mysqli_num_rows($already) > 0) {
                        $already_present = ['present' => $t_name . ', has been added already'];
                        echo json_encode($already_present);
                } else {
                        $stmt = mysqli_prepare($con, "INSERT INTO t_info
                  (t_name, t_dob, t_gender, t_subject, t_grade, t_email, t_phone, t_address, t_district, t_town, t_pwd, t_profile)
                  VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        mysqli_stmt_bind_param(
                                $stmt,
                                "ssssssssssss",
                                $t_name,
                                $t_dob,
                                $t_gender,
                                $t_subject,
                                $t_grade,
                                $t_email,
                                $t_phone,
                                $t_address,
                                $t_district,
                                $t_town,
                                $confirm_pwd,
                                $image_path
                        );
                        if (mysqli_stmt_execute($stmt)) {
                                $add = ['added' => 'Staff, ' . $t_name . ' has been added successfully.'];
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
