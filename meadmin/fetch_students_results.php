<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
include "../connection.php";
$student_grade3 = $_POST['student_grade3'];
$stmt = mysqli_prepare($con,  "SELECT * FROM student_info WHERE student_grade = ?");
mysqli_stmt_bind_param($stmt, 's', $student_grade3);
mysqli_stmt_execute($stmt);
$student_results = mysqli_stmt_get_result($stmt);

$students_row = array();
while($row = mysqli_fetch_assoc($student_results)){
    $students_row[] = $row;
}
echo json_encode($students_row);
}
?>