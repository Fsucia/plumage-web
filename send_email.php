<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "sboulard3@gatech.edu"; 


    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $body = "You have received a new message from the contact form.\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n\n";
    $body .= "Message:\n$message";


    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

 
    if (mail($to, $subject, $body, $headers)) {
        header("Location: sent.html");
        exit();
    } else {
        echo "Sorry, something went wrong. Email couldn't be sent.";
    }
} else {
    echo "Invalid request method.";
}
?>
