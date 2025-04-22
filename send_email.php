<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "kzheng92@gatech.edu"; // Change this to your real email address

    // Sanitize form inputs
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Message body
    $body = "You have received a new message from the contact form.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";

    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Attempt to send email
    if (mail($to, $subject, $body, $headers)) {
        header("Location: sent.html"); // Redirect to thank you page
        exit();
    } else {
        echo "Sorry, something went wrong. Email couldn't be sent.";
    }
} else {
    echo "Invalid request method.";
}
?>
