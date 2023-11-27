<?php
include 'config.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name'])) {
        $taskName = $_POST['name'];

        $sql = "DELETE FROM tasks WHERE task_title = ?";
        $stmt = $conn->prepare($sql);

        $stmt->bind_param("s", $taskName);

        if ($stmt->execute()) {
            echo "Task deleted successfully";
        } else {
            echo "Error deleting task: " . $conn->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>  