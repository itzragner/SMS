<?php
include 'config.php';

$groupId = $_POST['groupId'];
$taskId = $_POST['task'];

$query = "SELECT distinct students.*, student_tasks.* FROM students 
          LEFT JOIN student_tasks ON students.id = student_tasks.student_id 
          WHERE students.group_id = ? and student_tasks.task_id=? ";

$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $groupId,$taskId);
if ($stmt->execute()){
    $result = $stmt->get_result();
    $students = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($students);
} else {
    // Handle error
    echo json_encode(["error" => $stmt->error]);
}
?>