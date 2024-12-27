<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Sanitize input to prevent XSS
    $name = htmlspecialchars($name);
    $email = htmlspecialchars($email);
    $message = htmlspecialchars($message);

    // Your Gmail address
    $to = "akhilgusain2@gmail.com"; // Replace with your actual Gmail address
    $subject = "Contact Form Message from $name";

    // Email headers
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "From: $email" . "\r\n"; // Set the sender's email

    // Email body
    $body = "<html><body>";
    $body .= "<h2>Contact Form Message</h2>";
    $body .= "<p><strong>Name:</strong> $name</p>";
    $body .= "<p><strong>Email:</strong> $email</p>";
    $body .= "<p><strong>Message:</strong></p>";
    $body .= "<p>$message</p>";
    $body .= "</body></html>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "success"; // Response for AJAX success
    } else {
        echo "error"; // Response for AJAX error
    }
}
?>
