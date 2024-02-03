<?php

require_once 'connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO Users (Email, Password, AdminRights) VALUES (?, ?, '0')";

$stmt = $conn->prepare($sql);

$stmt->bind_param("ss", $email, $password);

if ($stmt->execute()) {
    echo "User registered successfully";
} else {
    echo "Error registering user: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
