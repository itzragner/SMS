<?php
session_start();
include 'config.php';

$userId = $_SESSION['id'];
$username = $_SESSION['username'];

$taskName = $_POST['taskName'];
$taskStarted = $_POST['taskStarted'];
$taskDeadline = $_POST['taskDeadline'];
$taskDescription = $_POST['taskDescription'];
$group_ids = $_POST['group_ids']; 

foreach ($group_ids as $groupId) {
    $sql = "INSERT INTO tasks (task_title, task_started, task_deadline, description,  teachertask_name,id_groupetask,status) VALUES (?, ?, ?, ?, ?,?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssis", $taskName, $taskStarted, $taskDeadline, $taskDescription,  $username,$groupId,$status);
    $status = 'started';
    $stmt->execute();
}

//$taskId = $conn->insert_id;
// foreach ($group_ids as $groupId) {
//     $sql = "INSERT INTO task_group (task_id, group_id) VALUES (?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ii", $taskId, $groupId);
//     $stmt->execute();
// }
// ///redirection
header('Location: tasks.php');

?>