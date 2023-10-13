<?php
include 'config.php';
$firstname=$_POST["teacherFirstName"];
$lastname=$_POST["teacherLastName"];   
$email=$_POST["teacherEmail"];
$age=$_POST["teacherAge"];
$num=$_POST["teacherNum"];
$mat=$_POST["teacherMatricule"];
$check_sql = "SELECT * FROM teachers WHERE matricule = '$mat'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
  // If the matricule already exists, echo a message and stop the script
  echo "The matricule already exists. try another one.";
  exit;
}
$sql = "INSERT INTO teachers ( firstname, lastname, email, num, matricule, age ) VALUES ('$firstname','$lastname','$email','$num','$mat','$age')";
if($conn->query($sql)===TRUE){
  header('Location: teachers.php');
  die();
} else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
