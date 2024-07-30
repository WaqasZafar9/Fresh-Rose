<?php
session_start();

header('Content-Type: application/json');

// Check if user is logged in
if (isset($_SESSION['user_id'])) {
    echo json_encode(['loggedIn' => true]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>
