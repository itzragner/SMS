<?php
include 'config.php'; // Include your database configuration file

$taskId = $_POST['id'];

$sql = "SELECT description FROM tasks WHERE id_tasks = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $taskId);

if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['description'];
    }
}
?>