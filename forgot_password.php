<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];

    // TODO: Add logic to check if the email exists in your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rgym";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Database not connected: " . mysqli_connect_error());
    }

    // Check if the email exists
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($conn, $checkEmailQuery);

    if (mysqli_num_rows($result) > 0) {
        // Email exists, redirect to the reset_password.php page with the email parameter
        header("Location: reset_password.php?email=$email");
        exit();
    } else {
        // Email does not exist, handle accordingly (display an error message, etc.)
        echo "Email does not exist in the database.";
    }

    mysqli_close($conn);
}
?>
