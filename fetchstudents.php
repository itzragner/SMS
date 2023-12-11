<?php
include 'config.php';

$groupId = $_POST['groupId'];

$query = "SELECT * FROM students WHERE group_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $groupId);

if ($stmt->execute()){
    $result = $stmt->get_result();
    $students = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($students);
} else {
    // Handle error
    echo json_encode(["error" => $stmt->error]);
}