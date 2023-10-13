<?php
include 'config.php';
$firstname=$_POST["studentFirstName"];
$lastname=$_POST["studentLastName"];   
$email=$_POST["studentEmail"];
$age=$_POST["studentAge"];
$num=$_POST["studentNum"];
$mat=$_POST["studentMatricule"];
$check_sql = "SELECT * FROM students WHERE matricule = '$mat'";
$check_result = mysqli_query($conn, $check_sql);

if (mysqli_num_rows($check_result) > 0) {
  // If the matricule already exists, echo a message and stop the script
  echo "The matricule already exists. try another one.";
  exit;
}
$sql = "INSERT INTO students ( firstname, lastname, email, num, matricule, age ) VALUES ('$firstname','$lastname','$email','$num','$mat','$age')";
if($conn->query($sql)===TRUE){
  header('Location: students.php');
  die();
} else{
  echo "Error: " . $sql . "<br>" . $conn->error;
}
?>
