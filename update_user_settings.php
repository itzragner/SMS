<?php

include_once 'config.php';
// get the data from the AJAX request
$matriculeuser = $_POST['mat'];
$emailuser = $_POST['emaile'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];

// update the user settings
if ($_SESSION['studentlogged'] == true){
    $sql = "UPDATE students SET email = ?, first_name = ?, last_name = ? WHERE matricule = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssss', $emailuser, $first_name, $last_name, $matriculeuser);
    $stmt->execute();
    $result1 = $stmt->affected_rows;
    $stmt->close();
} elseif($_SESSION['teacherlogged'] == true){
    $sql = "UPDATE teachers SET email = ?, first_name = ?, last_name = ? WHERE matricule = ?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param('ssss', $emailuser, $first_name, $last_name, $matriculeuser);
    $stmt->execute();
    $result1 = $stmt->affected_rows;
    $stmt->close();
}

$sql = "UPDATE accounts SET email = ?, first_name = ?, last_name = ? WHERE matricule = ?";
$stmt = $db->prepare($sql);
$stmt->bind_param('ssss', $emailuser, $first_name, $last_name, $matriculeuser);
$stmt->execute();
$result2 = $stmt->affected_rows;
$stmt->close();

if ($result1 > 0 || $result2 > 0) {
    echo 'User settings updated successfully.';
} else {
    echo 'Failed to update user settings.';
}


?>