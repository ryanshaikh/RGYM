<?php
// session_start();

// $uname = $_POST["username"];
// $pass = $_POST["password"];

// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "rgym";

// $conn = mysqli_connect($servername, $username, $password, $dbname);

// if (!$conn) {
//    echo "Database not connected".mysqli_connect_error();
// }

// $sql = "SELECT * FROM users WHERE (username='$uname' OR email='$uname') AND password='$pass'";

// $result = mysqli_query($conn, $sql);

// if (mysqli_num_rows($result) == 1) {
//     header("Location: index.html");
// } else {
//     echo "Login failed. Check your username/email and password.";
// }

// mysqli_close($conn);
?>



<!-- Login With Users/Admin -->

<?php
session_start();

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

// Check for admin credentials in the database
$sqlAdmin = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";
$resultAdmin = mysqli_query($conn, $sqlAdmin);

if (mysqli_num_rows($resultAdmin) == 1) {
    // Admin login successful
    $_SESSION["uname"] = $uname;
    $_SESSION["pass"] = $pass;
    header("Location: ./admin/dashboard.php");
    exit();
}

// Regular user login check
$sqlUser = "SELECT * FROM users WHERE (username='$uname' OR email='$uname') AND password='$pass'";
$resultUser = mysqli_query($conn, $sqlUser);

if (mysqli_num_rows($resultUser) == 1) {
    // Regular user login successful
    header("Location: index.html");
} else {
    echo "Login failed. Check your username/email and password.";
}

mysqli_close($conn);
?>


