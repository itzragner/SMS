<?php
include 'config.php';

$firstname = $_POST["teacherFirstNameedit"];
$lastname = $_POST["teacherLastNameedit"];   
$email = $_POST["teacherEmailedit"];
$age = $_POST["teacherAgeedit"];
$num = $_POST["teacherNumedit"];
$mat = $_POST["teacherMatriculeedit"];
$group_idsedit = $_POST["group_idsedit"];

// Update teacher details
$sql = "UPDATE teachers SET firstname = ?, lastname = ?, email = ?, age = ?, num = ? WHERE matricule = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssis", $firstname, $lastname, $email, $age, $num, $mat);
$stmt->execute();

// Get the teacher's ID
$sql = "SELECT id FROM teachers WHERE matricule = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $mat);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$teacher_id = $row['id'];

// Delete the current group assignments for the teacher
$sql = "DELETE FROM teacher_groups WHERE teacher_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $teacher_id);
$stmt->execute();

// Insert the new group assignments
foreach ($group_idsedit as $group_id) {
    $sql = "INSERT INTO teacher_groups (teacher_id, group_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $teacher_id, $group_id);
    $stmt->execute();
}

$stmt->close();
$conn->close();

header('Location: teachers.php');
die();

?>