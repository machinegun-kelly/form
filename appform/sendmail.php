<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';       // Your SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = 'youremail@gmail.com';  // Your Gmail address
        $mail->Password   = 'your_app_password';    // Use an App Password from Google
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Sender and recipient
        $mail->setFrom('youremail@gmail.com', 'Application Form');
        $mail->addAddress('youremail@gmail.com'); // Receiver

        // Form content
        $body = "";
        foreach ($_POST as $key => $value) {
            $body .= ucfirst($key) . ": " . htmlspecialchars($value) . "\n";
        }

        // Attach uploaded files
        if (isset($_FILES['driverFront']) && $_FILES['driverFront']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['driverFront']['tmp_name'], 'DriverLicense_Front.jpg');
        }

        if (isset($_FILES['driverBack']) && $_FILES['driverBack']['error'] == UPLOAD_ERR_OK) {
            $mail->addAttachment($_FILES['driverBack']['tmp_name'], 'DriverLicense_Back.jpg');
        }

        // Email content
        $mail->isHTML(false);
        $mail->Subject = 'New Application Submission';
        $mail->Body    = $body;

        $mail->send();
        echo "Success! Email sent.";

    } catch (Exception $e) {
        echo "Error sending email. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    echo "Invalid request.";
}
?>
