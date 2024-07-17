<?php
require 'application/config/connection.php';
require_once 'application/config/functions.php';

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $password = hash("sha512", $_POST['password']);

        $conn = new connection();
        $pdo = $conn->connect();

        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':email', $email);

        $stmt->execute();

        $rowCount = $stmt->rowCount();
        if ($rowCount > 0) {
            $response = array("success" => true);
            echo json_encode($response);
        } else {
            $response = array("success" => false, "message" => "Failed to update password");
            echo json_encode($response);
        }
    }
} catch (PDOException $e) {
    $response = array("success" => false, "message" => "Database connection failed: " . $e->getMessage());
    echo json_encode($response);
}
