<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "floyddod13@gmail.com"; // <- Replace with your email
    $subject = "New Application Submission";
    
    // Gather form data
    $body = "";
    foreach ($_POST as $key => $value) {
        $body .= ucfirst($key) . ": " . htmlspecialchars($value) . "\n";
    }

    // Attach files if needed (like driver's license)
    $headers = "From: no-reply@yourdomain.com";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Application submitted successfully.";
    } else {
        echo "Error sending email.";
    }
}
?>
