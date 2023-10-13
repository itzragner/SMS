<?php
include 'config.php';
$firstname=$_POST["studentFirstNameedit"];
$lastname=$_POST["studentLastNameedit"];   
$email=$_POST["studentEmailedit"];
$age=$_POST["studentAgeedit"];
$num=$_POST["studentNumedit"];
$mat=$_POST["studentMatriculeedit"];

$sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', email = '$email', age = '$age', num = '$num' WHERE matricule = '$mat'";
if(mysqli_query($conn, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
header('Location: students.php');
die();

?>