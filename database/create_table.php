<?php 
include 'connect.php';

$sql = "CREATE TABLE `users_levels` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
);

CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `UserLevel` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `users_pk` (`UserLevel`),
  CONSTRAINT `users_pk` FOREIGN KEY (`UserLevel`) REFERENCES `users_levels` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE
); 

CREATE TABLE `products` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `ProductName` varchar(255) DEFAULT NULL,
  `Price` decimal(10,0) DEFAULT NULL,
  `ImageUrl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Id`)
);

";

// Execute the query
if ($conn->query(   $sql) === TRUE) {
    echo "Table 'users' created successfully.";
} else {
    echo "Error creating table: " . $conn->error;
}

// Close the connection
$conn->close();
