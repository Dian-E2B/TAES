<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'destroy_otp') {
    unset($_SESSION['otp']); // Unset or destroy the session OTP
    echo json_encode(['status' => 'success']); // Send response if needed
    exit;
} else {
    echo json_encode(['status' => 'error']); // Handle error if POST data is incorrect
    exit;
}
?>