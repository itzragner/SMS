<?php
include 'config.php';
$firstname=$_POST["studentFirstNameedit"];
$lastname=$_POST["studentLastNameedit"];   
$email=$_POST["studentemailedit"];
$age=$_POST["studentAgeedit"];
$num=$_POST["studentNumedit"];
$mat=$_POST["studentmatriculeedit"];
$group_id = $_POST["studentgroupeedit"];
$sql = "UPDATE students SET firstname = '$firstname', lastname = '$lastname', email = '$email', age = '$age', num = '$num',group_id ='$group_id'  WHERE matricule = '$mat'";
if($conn->query($sql)) {
    echo"goood";
    header('Location: students.php');
    die();

} else {
    echo "Error updating record: " . mysqli_error($conn);
}

?>