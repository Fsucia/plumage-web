<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kzheng92@gatech.edu"; // your email address
    $subject = "New Contact Form Submission";
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Compose the email content
    $message_content = "Name: $name\n";
    $message_content .= "Email: $email\n";
    $message_content .= "Message: $message";

    // Set email headers
    $headers = "From: $email";

    // Send email
    if(mail($to, $subject, $message_content, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "Failed to send message.";
    }
}
?>