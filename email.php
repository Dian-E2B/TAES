<?php
require 'application/config/connection.php';
require_once 'application/config/functions.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';

$response = ['status' => 'error', 'message' => 'Unknown error'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email']) && isset($_POST['otp'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    // Check if the email exists in the database
    $conn = new connection();
    $pdo = $conn->connect();
    $stmt = $pdo->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $emailExists = $stmt->fetchColumn();

    if ($emailExists) {
        try {
            // Create a new PHPMailer instance
            $mail = new PHPMailer(true);

            // Server settings
            $mail->SMTPDebug = 0; // Disable debugging for production
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Gmail SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'lazaroooph@gmail.com'; // Your Gmail username
            $mail->Password = 'vneo czrp cxww bfhp'; // Your Gmail password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('lazaroooph@gmail.com', 'Password Reset');
            $mail->addAddress($email); // Add recipient email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset OTP';

            // HTML message with basic styling
            $mail->Body = '
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 20px;
                    }
                    .container {
                        max-width: 600px;
                        margin: 0 auto;
                        background-color: #fff;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        border-radius: 8px;
                        padding: 20px;
                    }
                    .otp {
                        font-size: 20px;
                        font-weight: bold;
                    }
                </style>
            </head>
            <body>
                <div class="container">
                    <p>You have requested to reset your password. Use the following OTP to proceed:</p>
                    <p class="otp">' . htmlspecialchars($otp) . '</p>
                    <p>If you did not request this, please ignore this email.</p>
                </div>
            </body>
            </html>
            ';

            $mail->send();

            // Debugging: Echo OTP and email
            $response['debug'] = [
                'email' => $email,
                'otp' => $otp
            ];

            $response['status'] = 'success';
            echo json_encode($response);
            exit();

        } catch (Exception $e) {
            $response['message'] = 'Error sending email: ' . $mail->ErrorInfo;
            echo json_encode($response);
            exit();
        }
    } else {
        $response['message'] = 'Account not found';
        echo json_encode($response);
        exit();
    }
}
?>