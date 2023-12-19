<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rgym";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database not connected" . mysqli_connect_error());
}

if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $sql = "DELETE FROM `users` WHERE `id` = $userId";

    if (mysqli_query($conn, $sql)) {
        echo "<center><h1>User Delete Sucessfully!!!!</h1></center>";
        echo "<script>
                setTimeout(function () {
                    window.location.href = 'dashboard.php';
                }, 800);
              </script>";
        exit();
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
}

mysqli_close($conn);
?>
