<?php
include 'config.php';
$firstname=$_POST["studentFirstName"];
$lastname=$_POST["studentLastName"];   
$email=$_POST["studentEmail"];
$age=$_POST["studentAge"];
$num=$_POST["studentNum"];
$mat=$_POST["studentMatricule"];

$sql = "UPDATE students SET firstname = '$firstName', lastname = '$lastName', email = '$email', age = '$age', num = '$num' WHERE matricule = '$mat'";
if(mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>