<?php
include 'config.php';
session_start();

$taskId = $_POST['taskId'];
$studentWork = $_POST['studentWork'];
$taskStatus = $_POST['taskStatusView'];
$studentId = $_SESSION['id'];

$sql = "UPDATE student_tasks SET work = ?, task_status = ? WHERE task_id = ? AND student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssii", $studentWork, $taskStatus, $taskId, $studentId);

if ($stmt->execute()) {
    header('Location: studenttask.php');
} else {
    // handle error
}
?>