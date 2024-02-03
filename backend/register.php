<?php

// Include the connection.php file
require_once 'connection.php';

// Get the form data from Angular
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Users (Email, Password, AdminRights) VALUES (?, ?, '0')";

$stmt = $conn->prepare($sql);

$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "User registered successfully";
} else {
    echo "Error registering user: " . $stmt->errorInfo()[2];
}

$stmt->closeCursor();
$conn = null;
