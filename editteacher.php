<?php
include 'config.php';
$firstname=$_POST["teacherFirstNameedit"];
$lastname=$_POST["teacherLastNameedit"];   
$email=$_POST["teacherEmailedit"];
$age=$_POST["teacherAgeedit"];
$num=$_POST["teacherNumedit"];
$mat=$_POST["teacherMatriculeedit"];

$sql = "UPDATE teachers SET firstname = '$firstname', lastname = '$lastname', email = '$email', age = '$age', num = '$num' WHERE matricule = '$mat'";
if(mysqli_query($conn, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
header('Location: teachers.php');
die();

?>