<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rgym";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();
}

$sql = "INSERT INTO `trialrequest` (`id`, `name`, `email`, `phone`, `message`) VALUES (NULL, '$name', '$email', '$phone', '$message')";

if (mysqli_query($conn, $sql)) {
    $mail = new PHPMailer(true);

    $emailSender = 'rgymofficial@gmail.com';
    $emailSenderPassword = 'upck oexs tawr npbj';

    try {
        // Configure SMTP settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = $emailSender;
        $mail->Password = $emailSenderPassword;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Recipient information
        $mail->setFrom($emailSender, 'Request Trial, R-GYM');
        $mail->addAddress($email, $name);
        $mail->addReplyTo($emailSender, 'Support');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'We Have Received Your Trail Request!';

        // Dynamic email template with text-based logo
        $emailContent = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        color: #333333;
                        margin: 0;
                        padding: 20px;
                    }
                    #logo {
                        font-size: 48px;
                        font-weight: bold;
                        color: #ffffff;
                    }
                    #slogan {
                        font-size: 18px;
                        color: #ffffff;
                    }
                    #container {
                        max-width: 600px;
                        margin: 0 auto;
                    }
                    #header {
                        background-color: #007bff;
                        padding: 20px;
                        text-align: center;
                    }
                    #content {
                        padding: 20px;
                        background-color: #343a40;
                        border-radius: 5px;
                        text-align: left;
                        color: #ffffff;
                    }
                    #footer {
                        background-color: #333333;
                        padding: 20px;
                        text-align: center;
                        color: #ffffff;
                    }
                    ul {
                        list-style: none;
                        padding: 0;
                        text-align: left;
                        margin-top: 0;
                    }
                    ul li {
                        margin-bottom: 10px;
                    }
                    a {
                        color: #007bff;
                        text-decoration: none;
                        font-weight: bold;
                    }
                    #ceo {
                        font-size: 18px;
                        margin-top: 10px;
                        color: #ffffff;
                    }
                    #contact-details {
                        padding: 10px;
                        border-radius: 5px;
                        margin-top: 20px;
                    }
                    #contact-details ul {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }
                    #contact-details ul li {
                        margin-bottom: 5px;
                    }
                    #contact-details strong {
                        font-weight: bold;
                        margin-right: 5px;
                    }
                    #disclaimer {
                        font-size: 12px;
                        color: #777777;
                        margin-top: 20px;
                    }
                </style>
            </head>
            <body>
                <div id='container'>
                    <div id='header'>
                        <div id='logo'>R-GYM</div>
                        <div id='slogan' style='color:#ffffff'>Your Fitness Journey Begins Here</div>
                        <p id='ceo' style='color:#ffffff'>From The Server Of R-GYM</p>
                    </div>
                    <div id='content' style='color:#ffffff'>
                        <p>Dear $name,</p>
                        <p>Thank you for reaching out to us at R-GYM. We have received your message, and our team will get back to you as soon as possible.</p>
                        <p>Your input is important to us, and we appreciate your interest in our services. If you have any further questions or concerns, feel free to contact us at info@rgym.com.</p>
                        <p>We look forward to assisting you on your fitness journey!</p>
                        <div id='contact-details'>
                            <p>Details submitted:</p>
                            <ul>
                                <li><strong>Name:</strong> $name</li>
                                <li><strong>Email:</strong> $email</li>
                                <li><strong>Phone:</strong> $phone</li>
                                <li><strong>Message:</strong> $message</li>
                            </ul>
                        </div>
                        <p id='disclaimer'>This is an auto-generated email. Please do not reply to this message.</p>
                    </div>
                    <div id='footer'>
                        <p>Contact us at: info@rgym.com</p>
                    </div>
                </div>
            </body>
            </html>
        ";

        $mail->Body = $emailContent;

        $mail->send();
        echo 'Email sent successfully';
    } catch (Exception $e) {
        echo 'Failed to send email: ', $mail->ErrorInfo;
    }

    header("Location: thankyoutrial.html");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);
?>
