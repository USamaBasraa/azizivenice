<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Initialize variables
$first_name = '';
$last_name = '';
$email = '';
$phone_number = '';
$message = '';
$successMessage = '';



if (isset($_POST["send"])) {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $phone_number = $_POST["phone_number"];
    $message = $_POST["message"];

    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'usamabadarbasra@gmail.com';
        $mail->Password   = 'jxkz meji uqnb zndz'; // Use your App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        $mail->setFrom('usamabadarbasra@gmail.com', 'Contact Form');
        $mail->addAddress('rafat.dxb@gmail.com', 'CEO Email');
        

        $mail->isHTML(true);
        $mail->Subject = 'New Record';
        $mail->Body    = "Sender Name: $first_name $last_name <br> Sender Email: $email <br> Phone Number: $phone_number <br> Message: $message";

        $mail->send();
        

                  
              // Clear form data
        $first_name = '';
        $last_name = '';
        $email = '';
        $phone_number = '';
        $message = '';


   // Set success message in session
   $_SESSION['success_message'] = "Your information has been received!";


        header('Location: index.php');
        exit; 
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>