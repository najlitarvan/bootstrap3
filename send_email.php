<?php
// Collect form data
$name = isset($_POST['name']) ? strip_tags(trim($_POST['name'])) : '';
$email = isset($_POST['email']) ? filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL) : '';
$message = isset($_POST['message']) ? trim($_POST['message']) : '';

// Validate inputs
if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    // Redirect back with an error message
    header("Location: index.html?error=invalidinput");
    exit;
}

// Construct the email message
$email_message = "Name: $name\nEmail: $email\n\nMessage:\n$message";

// Use wordwrap() if lines are longer than 70 characters
$email_message = wordwrap($email_message, 70);

// Email parameters
$to = "najlitarvan@seznam.cz";
$subject = "Contact Form Submission from $name";
$headers = "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

// Send the email
if (mail($to, $subject, $email_message, $headers)) {
    // Redirect to the original page with a success message
    header("Location: index.html?success=1");
} else {
    // Redirect to the original page with an error message
    header("Location: index.html?error=mailfailed");
}
exit;
?>
