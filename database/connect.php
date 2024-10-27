<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "funirodb";
// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Database connection status: Connected successfully";
mysqli_select_db($conn,'funirodb');

