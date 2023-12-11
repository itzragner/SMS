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
    $sql = "INSERT INTO tasks (task_title, task_started, task_deadline, description,  teachertask_name,id_groupetask) VALUES (?, ?, ?, ?, ?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $taskName, $taskStarted, $taskDeadline, $taskDescription,  $username,$groupId);
    $stmt->execute();

    $taskId = $conn->insert_id;

    $sql2 = "SELECT id FROM students WHERE group_id = ?";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bind_param("i", $groupId);
    $stmt2->execute();
    $result2 = $stmt2->get_result();
    
    // Insert a record into student_tasks for each student with the new task
    while ($student = $result2->fetch_assoc()) {
        $sql3 = "INSERT INTO student_tasks (student_id, task_id, task_status,teacher_name) VALUES (?, ?, ?,?)";
        $stmt3 = $conn->prepare($sql3);
        $studentId = $student['id'];
        $taskStatus = 'started'; // Default status for student's task
        $stmt3->bind_param("iiss", $studentId, $taskId, $taskStatus,$username);
        $stmt3->execute();
    }

}



// foreach ($group_ids as $groupId) {
//     $sql = "INSERT INTO task_group (task_id, group_id) VALUES (?, ?)";
//     $stmt = $conn->prepare($sql);
//     $stmt->bind_param("ii", $taskId, $groupId);
//     $stmt->execute();
// }
// ///redirection
if($_SESSION['role'] == 'teacher'){
    header('Location: teachertask.php');
}else   {header('Location: tasks.php');}

?>