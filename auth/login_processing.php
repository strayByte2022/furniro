<?php
require_once '../database/connect.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username) || empty($password)) {
        header("Location: ../index.php");
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
                $_SESSION['username'] = $username;
                

                http_response_code(200);
                header("Location: ../index.php");
                exit();

                // send a session 
            } else {

                http_response_code(401);
                header("Location: ../index.php");
                echo json_encode(["message" => "Invalid username or password"]);
                exit();
            }

        } else {
            
           http_response_code(404);
           header("Location: ../index.php");
           echo json_encode(["message" => "User not found"]);
        }
        $stmt -> close();

    }
}