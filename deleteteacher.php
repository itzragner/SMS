<?php
include 'config.php';

if ((isset($_POST['mat']))&& (isset($_POST['email']))) {
    $mat = $_POST['mat'];
    $email = $_POST['email'];
    // Get the teacher's ID
    $sql = "SELECT * FROM teachers WHERE matricule = '$mat'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    $teacher_id = $row['id'];
    $teacher_name=$row['firstname'].' '.$row['lastname'];
    echo $teacher_name;

    // Delete the teacher's tasks from the tasks table
   $sql1 = "DELETE FROM tasks WHERE teachertask_name = '$teacher_name'";
   if (!mysqli_query($conn, $sql1)) {
       echo "Error deleting tasks: " . mysqli_error($conn);
       
   }
   $sql2 = "DELETE FROM student_tasks WHERE teacher_name = '$teacher_name'";
  if (!mysqli_query($conn, $sql2)) {
      echo "Error deleting student tasks: " . mysqli_error($conn);
      
  }
    // Delete the teacher's assignments from the teacher_groups table
    $sql3 = "DELETE FROM teacher_groups WHERE teacher_id = '$teacher_id'";
    if (!mysqli_query($conn, $sql3)) {
        echo "Error deleting assignments: " . mysqli_error($conn);
        
    }

    // Delete the teacher from the teachers table
    $sql4 = "DELETE FROM teachers WHERE matricule = '$mat'";
    if (!mysqli_query($conn, $sql4)) {
        echo "Error deleting teacher: " . mysqli_error($conn);
        
    }

    // Delete the teacher's account from the accounts table
    $sql5 = "DELETE FROM accounts WHERE email = '$email'";
    if (!mysqli_query($conn, $sql5)) {
        echo "Error deleting account: " . mysqli_error($conn);
        
    }

    echo "good";
}


?>