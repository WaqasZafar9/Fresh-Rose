<?php
// Database configuration
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'freshrose');

// Connect to the database
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if ($mysqli->connect_error) {
    // Log the error to a file (recommended for production)
    error_log("Connection failed: " . $mysqli->connect_error);
    // Display a user-friendly message
    die("Database connection failed. Please try again later.");
}
?>
