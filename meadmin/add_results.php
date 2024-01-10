<?php 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include "../connection.php";
    $std_subject = $_POST['std_subject'];
    $std_ids = $_POST['std_id'];
    $std_names = $_POST['std_name'];
    $std_scores = $_POST['std_score'];
    
    for($i=0; $i < count($std_ids); $i++){
        $student_id = $std_ids[$i];
        $student_score = $std_scores[$i];
        $student_name = $std_names[$i];
    $stmt3 = mysqli_prepare($con, "UPDATE student_info SET `$std_subject` = ? WHERE student_id = ? AND student_name = ?");
    mysqli_stmt_bind_param($stmt3, 'iis', $student_score, $student_id, $student_name);
    mysqli_stmt_execute($stmt3);
    }
}
?>