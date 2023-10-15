<?php

function createAccount($email, $firstname, $matricule,$role) {
    $password = $firstname . $matricule; // Create the password
    $password = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    $sql = "INSERT INTO accounts ( email , password, role ) VALUES (?, ?,?)";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("sss", $email, $password,$role);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            echo "Account created successfully.";
        } else {
            echo "ERROR: Could not execute query: $sql. " . $conn->error;
        }
    } else {
        echo "ERROR: Could not prepare query: $sql. " . $conn->error;
    }
    $stmt->close();
    $conn->close();
}


?>