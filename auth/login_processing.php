<?php
require_once '../database/connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        // header("Location: ../index.php");
    } else {
        $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Fetch the stored password
            $stmt->bind_result($storedPassword);
            $stmt->fetch();
            // Verify the password
            if (strcmp($password, $storedPassword) == 0) { //password_verify($password, $storedPassword) can be used for hash comparison

                session_start();
                echo $username;
                $_SESSION['username'] = $username;
                header("Location: ../index.php?page=home");
                $stmt->close();
                exit();

            } else {

                header("Location: ../index.php?page=login&error=invalid-password");
                $stmt->close();
                exit();
            }
        }
        else{
            header("Location: ../index.php?page=login&error=invalid-username");
            $stmt->close();
            exit();
        }
        
    }
}
