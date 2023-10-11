<?php
include 'config.php';
$firstname=$_POST["studentFirstName"];
$lastname=$_POST["studentLastName"];   
$email=$_POST["studentEmail"];
$age=$_POST["studentAge"];
$num=$_POST["studentNum"];
$mat=$_POST["studentMatricule"];

$sql = "INSERT INTO students ( firstname, lastname, email, num, matricule, age ) VALUES ('$firstname','$lastname','$email','$num','$mat','$age')";
if($conn->query($sql)===TRUE){
} else{
  echo "error" .$sql. $conn->error;
}
header('Location: students.php');
die();
?>
