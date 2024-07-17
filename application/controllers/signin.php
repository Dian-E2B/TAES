<?php
require 'application/config/connection.php';
require_once 'application/config/functions.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/SMTP.php';

session_start();

if (isset($_SESSION['is_logged_in'])) {
	header('Location:index.php');
}

$message = "";

if (isset($_POST['signin'])) {
	$email_address = $_POST['email-address'];
	$password = hash("sha512", $_POST['password']);
	$data = ['email' => $email_address, 'password' => $password];

	// Check in users table first
	$query = "SELECT * FROM users WHERE email=:email AND password=:password";
	$result = $function->signin($query, $data);

	if (!empty($result)) {
		$_SESSION['user'] = $result;
		$_SESSION['is_logged_in'] = true;
		header('Location:index.php');

		function generateOTP()
		{
			return rand(10000, 99999);
		}
		$_SESSION['otp'] = generateOTP();

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
			$mail->setFrom('lazaroooph@gmail.com', 'Login OTP');
			$mail->addAddress($email_address); // Add recipient email

			// Content
			$mail->isHTML(true);
			$mail->Subject = 'Login OTP';

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
					<p>Use the following OTP to proceed to login:</p>
					<p class="otp">' . htmlspecialchars($_SESSION['otp']) . '</p>
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
		$query = "SELECT * FROM admin WHERE username=:email AND password=:password";
		$result = $function->signin($query, $data);

		if (!empty($result)) {
			$_SESSION['admin'] = $result;
			$_SESSION['is_logged_in'] = true;
			header('Location:admin');
		} else {
			$message = '
            <div class="col-md-12 bs-callout bs-callout-danger">
            <h4>Login Failed</h4>
            The email or password you’ve entered is incorrect.
            </div>
            ';
		}
	}
}


?>