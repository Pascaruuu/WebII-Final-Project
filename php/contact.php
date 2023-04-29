<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form fields and trim the input
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $message = trim($_POST["message"]);

    // Set the recipient email address
    $to = "tuypascal012@gmail.com";

    // Set the email subject
    $subject = "New message from your website";

    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Phone: $phone\n\n";
    $email_content .= "Message:\n$message\n";

    // Build the email headers
    $headers = "From: $name <$email>\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // Email sent successfully
        echo "Thank you for your message! We will get back to you soon.";
    } else {
        // Email not sent
        echo "Oops! Something went wrong and we couldn't send your message.";
    }

} else {
    // If the request method is not POST
    header("HTTP/1.0 403 Forbidden");
    echo "There was a problem with your submission, please try again.";
}
?>
