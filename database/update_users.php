<?php
include 'connect.php'; // Ensure database connection

// Define variables for the update
$id = 1; // 
$username = 'milkyx@g2.com';
$password = 'caps';
$userLevel = 1;


$stmt = $conn->prepare("UPDATE `users` SET `Username` = ?, `Password` = ?, `UserLevel` = ? WHERE `Id` = ?");
$stmt->bind_param("sssi", $username, $password, $userLevel, $id); // "sssi" means 3 strings and 1 integer

if ($stmt->execute()) {
    echo "User updated successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();