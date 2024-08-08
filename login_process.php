<?php
require_once 'db.php'; // Ensure this file initializes $mysqli
session_start();
header('Content-Type: application/json');

// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = ["status" => "error", "message" => "Invalid request"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if (!empty($email) && !empty($password)) {
        // Use a prepared statement for better security and performance
        $sql = "SELECT id, first_name, last_name, email, password FROM register WHERE email = ?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $email);
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $first_name, $last_name, $email, $hashed_password);
                    if ($stmt->fetch()) {
                        // Verify password
                        if (password_verify($password, $hashed_password)) {
                            // Set session variables
                            $_SESSION["id"] = $id;
                            $_SESSION["first_name"] = $first_name;
                            $_SESSION["last_name"] = $last_name;
                            $_SESSION["email"] = $email;
                            $response = ["status" => "success", "message" => "Welcome " . $_SESSION['first_name'] . " " . $_SESSION['last_name']];
                        } else {
                            $response["message"] = "Invalid password.";
                        }
                    }
                } else {
                    $response["message"] = "No account found with that email.";
                }
            } else {
                $response["message"] = "Database query failed: " . $stmt->error;
            }
            $stmt->close();
        } else {
            $response["message"] = "Failed to prepare statement: " . $mysqli->error;
        }
    } else {
        $response["message"] = "Please enter email and password.";
    }

    $mysqli->close();
}

echo json_encode($response);
?>
