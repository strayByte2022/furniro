<?php
include 'connect.php'; // Ensure database connection

// Define variables for the user details
$username = 'milkyx';
$password = 'caps';
$userLevel = 1;

// Use a prepared statement to insert the data
$stmt = $conn->prepare("INSERT INTO `users` (`Username`, `Password`, `UserLevel`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $username, $password, $userLevel);

if ($stmt->execute()) {
    echo "New user added successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();