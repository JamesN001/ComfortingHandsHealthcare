<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data safely
    $name = htmlspecialchars(trim($_POST['name']));
    $visitor_email = htmlspecialchars(trim($_POST['email']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Email settings
    $email_from = 'Info@shainacare.com.au';
    $email_subject = "New Form Submission: $subject";
    $email_body = "You have received a new message from your website contact form.\n\n" .
                  "Name: $name\n" .
                  "Email: $visitor_email\n" .
                  "Subject: $subject\n" .
                  "Message:\n$message\n";

    $to = "jamesnjiva@gmail.com";
    $headers = "From: $email_from\r\n";
    $headers .= "Reply-To: $visitor_email\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Redirect back to contact page with success
        header("Location: contact.html?success=true");
        exit();
    } else {
        // Redirect back with error
        header("Location: contact.html?error=true");
        exit();
    }
} else {
    // If accessed directly, redirect to contact page
    header("Location: contact.html");
    exit();
}
?>