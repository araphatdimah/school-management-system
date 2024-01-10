<?php 
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
    include "../connection.php";
    $std_grade = $_POST['std_grade'];
    $stmt1 = mysqli_prepare($con, "SELECT * FROM student_info WHERE student_grade = ?");
    mysqli_stmt_bind_param($stmt1, 's', $std_grade);
    mysqli_stmt_execute($stmt1);
    $student_info = mysqli_stmt_get_result($stmt1);

    $student_row = array();
    while($row1 = mysqli_fetch_assoc($student_info)){
        $student_row[] = $row1;
    }
    echo json_encode($student_row);
}
?>	