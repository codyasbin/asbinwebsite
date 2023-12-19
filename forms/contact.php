<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = "himalthapa346@gmail.com"; // Replace with your email address

    // Set additional headers
    $headers = "From: $name <$email>" . "\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    $headers .= "Content-Type: text/html;charset=UTF-8" . "\r\n";

    // Compose the email message
    $email_message = "
        <html>
        <body>
            <h2>New Contact Form Submission</h2>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
    ";

    // Send the email
    $mail_success = mail($to, $subject, $email_message, $headers);

    if ($mail_success) {
        // If the email is sent successfully, display a JavaScript alert
        echo '<script type="text/javascript">window.alert("Your message has been sent. Thank you!");</script>';
    } else {
        // If there's an error in sending the email, display a JavaScript alert
        echo '<script type="text/javascript">window.alert("Oops! There was an error. Please try again later.");</script>';
    }
} else {
    // If the request method is not POST, redirect to the form page
    header("Location: ../index.html"); // Replace with the actual path to your form page
    exit();
}
?>
