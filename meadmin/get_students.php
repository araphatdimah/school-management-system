<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "../connection.php";
    $student_grade = $_POST['student_grade'];
    $stmt = mysqli_prepare($con, "SELECT * FROM student_info WHERE student_grade = ?");
    mysqli_stmt_bind_param($stmt, 's', $student_grade);
    mysqli_stmt_execute($stmt);
    $student_result = mysqli_stmt_get_result($stmt);

    $student_rows = array(); 

    while ($row = mysqli_fetch_assoc($student_result)) {
        $student_rows[] = $row;
    }

    echo json_encode($student_rows); 
}

?>