<?php
include 'config.php';
if ((isset($_POST['mat']))&& (isset($_POST['email']))) {
    $mat = $_POST['mat'];
    $email = $_POST['email'];
    $sql1 = "DELETE FROM teachers WHERE matricule = '$mat'";
    $sql2 = "DELETE FROM accounts WHERE email = '$email'";
    


    if((mysqli_query($conn, $sql1))&&((mysqli_query($conn, $sql2)))) {
        echo "good";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}
header('Location: teachers.php');
die();
?>