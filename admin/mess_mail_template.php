<?php
// Fetch messages data from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rgym";

// Connect to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database not connected: " . mysqli_connect_error());
}

// Fetch messages data
$sql = "SELECT * FROM messages";
$result = mysqli_query($conn, $sql);
$freetrialData = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Free Trial Request - R-GYM</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
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
            background-color: #ffffff;
            border-radius: 5px;
            text-align: left;
            color: #333333;
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

        #admin {
            font-size: 18px;
            margin-top: 10px;
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

    <div id="container">
        <div id="header">
            <div id="logo">R-GYM</div>
            <div id="slogan">Your Fitness Journey Begins Here</div>
            <p id="admin">From the Server Of R-GYM</p>
        </div>
        <div id="content">
            <?php
            // Get the entry ID from the URL parameter
            $entryId = isset($_GET['id']) ? $_GET['id'] : null;

            // Fetch data for the selected entry
            $selectedEntry = null;
            foreach ($freetrialData as $entry) {
                if ($entry['id'] == $entryId) {
                    $selectedEntry = $entry;
                    break;
                }
            }

            if ($selectedEntry) {
                // Default values for subject and message
                $subject = "Re: Your Message to R-GYM";
                // Dynamic email template
                $emailContent = "
                    <html>
                    <head>
                        <style>
                             body {
            font-family: 'Arial', sans-serif;
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
            background-color: #ffffff;
            border-radius: 5px;
            text-align: left;
            color: #333333;
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

        #admin {
            font-size: 18px;
            margin-top: 10px;
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
                                <div id='slogan'>Your Fitness Journey Begins Here</div>
                                <p id='admin'>From the Reception Of R-GYM</p>
                            </div>
                            <div id='content'>
                                <p>Hello {$selectedEntry['name']},</p>
                                <p>Thank you for reaching out to R-GYM. We appreciate your message!!!!</p>
                                <p>Here are the details you provided:</p>
                                <ul>
                                    <li><strong>Name:</strong> {$selectedEntry['name']}</li>
                                    <li><strong>Email:</strong> {$selectedEntry['email']}</li>
                                    <li><strong>Phone:</strong> {$selectedEntry['mobile']}</li>
                                    <li><strong>Message:</strong> {$selectedEntry['message']}</li>
                                </ul>
                                <p>We will review your message and get back to you as soon as possible.</p>
                                <p>If you have any further questions or concerns, feel free to contact us via email or phone at your convenience.</p>
                                <p>Contact Details:</p>
                                <div id='contact-details'>
                                    <ul>
                                        <li><strong>Email:</strong> info@rgym.com</li>
                                        <li><strong>Phone:</strong> +91 012-3456-789</li>
                                    </ul>
                                </div>
                                <p>We look forward to assisting you on your fitness journey!</p>
                            </div>
                            </div>
                            <div id='footer'>
                                <p>Contact us at: info@rgym.com</p>
                            </div>
                        </div>
                    </body>
                    </html>
                ";

                // Display the email content in the form
                ?>
                <form action="mess_send_mail.php" method="post">
                    <div class="form-group">
                        <label for="recipient">Recipient Email:</label>
                        <input type="email" class="form-control" id="recipient" name="recipient" value="<?php echo $selectedEntry['email']; ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="subject">Subject:</label>
                        <input type="text" class="form-control" id="subject" name="subject" value="<?php echo $subject; ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="12" required><?php echo $emailContent; ?></textarea>
                    </div>
                    <input type="hidden" name="entry_id" value="<?php echo $selectedEntry['id']; ?>">
                    <button type="submit" class="btn btn-primary">Send Mail</button>
                </form>
            <?php } else { ?>
                <p class="text-danger">Invalid entry ID or entry not found.</p>
            <?php } ?>
        </div>
        <div id="footer">
            <p>Contact us at: info@rgym.com</p>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
