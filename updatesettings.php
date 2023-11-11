<?php
session_start();
include_once 'config.php';
$matriculeuser = $_POST['matri'];
$emailuser = $_POST['emaile'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];

if ($_POST['emaile'] != $_SESSION['email']) {
  $_SESSION['email_changed'] = true;
}

if ($_SESSION['studentlogged'] == true){
    $sql1 = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', email = '$emailuser' WHERE matricule = '$matriculeuser'";
} 
elseif($_SESSION['teacherlogged'] == true){
    $sql1 = "UPDATE teachers SET firstname = '$firstname', lastname = '$lastname', email = '$emailuser' WHERE matricule = '$matriculeuser'";
}

$sql2 = "UPDATE accounts SET email = '$emailuser' WHERE matricule = '$matriculeuser'";
if(($conn->query($sql1)===TRUE )&&($conn->query($sql2)===TRUE  )&&($_SESSION['email_changed'] == true)){
    $_SESSION = array();
    session_destroy();
    header("Location: index.php?logout=1");
    exit;
}
else if(($conn->query($sql1)===TRUE )&&($conn->query($sql2)===TRUE  )){
    header('Location: profile.php');
  } else{
    echo "Error: " . $sql1 . "<br>" . $conn->error;
    echo"<br>";
    echo "Error: " . $sql2 . "<br>" . $conn->error;
  }


?>