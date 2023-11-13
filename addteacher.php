<?php
include 'config.php';
$firstname=$_POST["teacherFirstName"];
$lastname=$_POST["teacherLastName"];   
$email=$_POST["teacherEmail"];
$age=$_POST["teacherAge"];
$num=$_POST["teacherNum"];
$mat=$_POST["teacherMatricule"];

$group_ids = $_POST["group_ids"];
$check_sql1 = "SELECT * FROM teachers WHERE matricule = '$mat' ";
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
$sql1 = "INSERT INTO teachers ( firstname, lastname, email, num, matricule, age ) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("ssisss", $firstname, $lastname, $email, $num, $mat, $age);
$stmt->execute();


$teacher_id = $stmt->insert_id;

$password = $firstname . $mat;
$password = password_hash($password, PASSWORD_DEFAULT);
$sql2 = "INSERT INTO accounts ( email , password, role ,matricule ) VALUES (?, ?, 'teacher', ?)";
$stmt = $conn->prepare($sql2);
$stmt->bind_param("sss", $email, $password, $mat);
$stmt->execute();

$sql = "INSERT INTO teacher_groups (teacher_id, group_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);

foreach ($group_ids as $group_id) {
    $stmt->bind_param("ii", $teacher_id, $group_id);
    if ($stmt->execute()) {
      echo "Successfully assigned group $group_id to teacher $teacher_id.<br>";
  } else {
      echo "Error assigning group $group_id to teacher $teacher_id: " . $stmt->error . "<br>";
  }
}

$stmt->close();
$conn->close();
?>