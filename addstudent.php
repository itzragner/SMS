<?php
include 'config.php';
$firstname=$_POST["studentFirstName"];
$lastname=$_POST["studentLastName"];   
$email=$_POST["studentEmail"];
$age=$_POST["studentAge"];
$num=$_POST["studentNum"];
$mat=$_POST["studentMatricule"];
$check_sql1 = "SELECT * FROM students WHERE matricule = '$mat' ";
$check_sql2 = "SELECT * FROM accounts WHERE email = '$email' ";
$check_result1 = mysqli_query($conn, $check_sql1);
$check_result2 = mysqli_query($conn, $check_sql2);

if (mysqli_num_rows($check_result1) > 0) {
  echo "The matricule already exists. try another one.";
  exit;
}
if(mysqli_num_rows($check_result2)>0){
  echo "The email already exists. try another one.";
  exit;
}
$sql1 = "INSERT INTO students ( firstname, lastname, email, num, matricule, age ) VALUES ('$firstname','$lastname','$email','$num','$mat','$age')";
$password = $firstname . $mat;
$password = password_hash($password, PASSWORD_DEFAULT);
$sql2 = "INSERT INTO accounts ( email , password, role ,matricule ) VALUES ('$email', '$password','student','$mat')";

if(($conn->query($sql1)===TRUE )&&($conn->query($sql2)===TRUE  )){
  header('Location: students.php');
  die();
} else{
  echo "Error: " . $sql1 . "<br>" . $conn->error;echo "Error: " . $sql2 . "<br>" . $conn->error;
}
?>
