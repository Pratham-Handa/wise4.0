<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $firstName = sanitize_input($_POST['first-name']);
    $lastName = sanitize_input($_POST['last-name']);
    $email = sanitize_input($_POST['email']);
    $whatsapp = sanitize_input($_POST['whatsapp']);
    $message = sanitize_input($_POST['message']);

    // Email recipient
    $to = "inquiry@intelliwiseacademy.com";
    $subject = "New Inquiry from Website";
    
    // Email body content
    $body = "New inquiry received:\n\n";
    $body .= "First Name: $firstName\n";
    $body .= "Last Name: $lastName\n";
    $body .= "Email: $email\n";
    $body .= "WhatsApp: $whatsapp\n";
    $body .= "Message:\n$message\n";
    
    // Email headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
    
    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for your inquiry. We will get back to you soon.";
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
}

function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}
?>
