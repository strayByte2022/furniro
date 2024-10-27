<?php
include 'connect.php'; // Ensure database connection

// Define the ID of the user to delete
$id = 1;

// Prepare the delete statement
$stmt = $conn->prepare("DELETE FROM `users` WHERE `Id` = ?");
$stmt->bind_param("i", $id); // "i" means integer

// Execute and check for success
if ($stmt->execute()) {
    echo "User deleted successfully.";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();