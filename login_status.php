<?php
session_start();

// Check login state
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin'];
header('Content-Type: application/json');
echo json_encode(['isLoggedIn' => $isLoggedIn]);
?>
