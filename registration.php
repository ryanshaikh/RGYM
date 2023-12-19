<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$name = $_POST["name"];
$cemail = $_POST["email"];
$uname = $_POST["username"];
$pass = $_POST["password"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rgym";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    echo "Database not connected" . mysqli_connect_error();
}

$sql = "INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`) VALUES (NULL, '$name', '$cemail', '$uname', '$pass');";

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
        $mail->setFrom($emailSender, 'RYAN SHAIKH, CEO R-GYM');
        $mail->addAddress($cemail, $name);
        $mail->addReplyTo($emailSender, 'RYAN SHAIKH');

        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Welcome to R-GYM! Your Account Has Been Created Successfully';

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
                        color: #ffffff; /* Changed logo color to white */
                    }

                    #slogan {
                        font-size: 18px;
                        color: #333333;
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
                        background-color: #343a40; /* Changed details section background color to a darker shade */
                        border-radius: 5px;
                        text-align: left;
                        color: #ffffff; /* Changed text color to white */
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
                    }

                    #account-details {
                        padding: 10px;
                        border-radius: 5px;
                        margin-top: 20px;
                    }

                    #account-details ul {
                        list-style: none;
                        padding: 0;
                        margin: 0;
                    }

                    #account-details ul li {
                        margin-bottom: 5px;
                    }

                    #account-details strong {
                        font-weight: bold;
                        margin-right: 5px;
                    }
                </style>
            </head>
            <body>
                <div id='container'>
                    <div id='header'>
                        <div id='logo'>R-GYM</div>
                        <div id='slogan'>Your Fitness Journey Begins Here</div>
                        <p id='ceo'>From the Desk of CEO RYAN SHAIKH</p>
                    </div>
                    <div id='content' style='color: #ffffff'>
                        <p>Dear $name,</p>
                        <p>Welcome to the R-GYM family! I am thrilled to extend my warmest greetings as you embark on your fitness journey with us.</p>
                        <p>At R-GYM, we are committed to providing you with an exceptional fitness experience, tailored to meet your unique goals. Our state-of-the-art facilities, expert trainers, and a supportive community are here to inspire and guide you every step of the way.</p>
                        <p>Your decision to join R-GYM is a significant step toward a healthier and more active lifestyle. We are excited to be part of your fitness transformation and look forward to celebrating your achievements with you.</p>
                        <p>Feel free to explore our facilities, engage with our trainers, and connect with fellow members. Should you have any questions or need assistance, our dedicated team is here to help.</p>
                        <p>Thank you for choosing R-GYM. Together, let's reach new heights of fitness and well-being!</p>
                        <p>You can login <a href='http://yourwebsite.com/login.html'>here</a>.</p>
                        <div id='account-details'>
                            <p>Below are your account details:</p>
                            <ul>
                                <li><strong>Name:</strong> $name</li>
                                <li><strong>Email:</strong> $cemail</li>
                                <li><strong>Username:</strong> $uname</li>
                                <li><strong>Password:</strong> $pass</li>
                            </ul>
                        </div>
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

    header("Location: index.html#login");
} else {
    echo "Something went wrong";
}

mysqli_close($conn);

?>
