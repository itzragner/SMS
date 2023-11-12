<?php
include 'config.php';
if ((isset($_POST['mat']))&& (isset($_POST['email']))) {
    $mat = $_POST['mat'];
    $email = $_POST['email'];

    // Get the teacher's ID
    $sql = "SELECT id FROM teachers WHERE matricule = '$mat'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teacher_id = $row['id'];

    // Delete the teacher's assignments from the teacher_groups table
    $sql = "DELETE FROM teacher_groups WHERE teacher_id = '$teacher_id'";
    if (!mysqli_query($conn, $sql)) {
        echo "Error deleting assignments: " . mysqli_error($conn);
        exit;
    }

    // Delete the teacher from the teachers table
    $sql1 = "DELETE FROM teachers WHERE matricule = '$mat'";
    if (!mysqli_query($conn, $sql1)) {
        echo "Error deleting teacher: " . mysqli_error($conn);
        exit;
    }

    // Delete the teacher's account from the accounts table
    $sql2 = "DELETE FROM accounts WHERE email = '$email'";
    if (!mysqli_query($conn, $sql2)) {
        echo "Error deleting account: " . mysqli_error($conn);
        exit;
    }

    echo "good";
}

header('Location: teachers.php');
die();
?>