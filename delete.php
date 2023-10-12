<?php
include 'config.php';
if (isset($_POST['mat'])) {
    $mat = $_POST['mat'];
    $sql = "DELETE FROM students WHERE matricule = '$mat'";

    if(mysqli_query($conn, $sql)) {
        echo "good";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
header('Location: students.php');
die();
?>