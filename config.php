<?php 
$username="root";
$password="";
$host="localhost";
$database="projet";
$conn = mysqli_connect($host, $username, $password,$database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  
?>