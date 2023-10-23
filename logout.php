<?php
// Start the session
session_start();

// Destroy the session
session_destroy();
$_SESSION['adminlogged']=False;
$_SESSION['teacherlogged']=False;
$_SESSION['studentlogged']=False;
// Redirect to login page
header('Location: index.php');
exit;
?>