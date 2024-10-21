<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $email = htmlspecialchars($_POST['email']);
    $phone_number = htmlspecialchars($_POST['phone_number']);
    $message = htmlspecialchars($_POST['message']);
    
    // Specify the email address to send the form data
    $to = "rafat.dxb@gmail.com"; // Change to your email address
    $subject = "New Form Submission";
    
    // Create the email content
    $body = "First Name: $first_name\n";
    $body .= "Last Name: $last_name\n";
    $body .= "Email: $email\n";
    $body .= "Phone Number: $phone_number\n";
    $body .= "Message: $message\n";
    
    // Set the headers
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Thank you! Your message has been sent.'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Sorry, there was an error sending your message.'); window.history.back();</script>";
    }
}
?>
