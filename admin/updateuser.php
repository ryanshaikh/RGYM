<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rgym";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database not connected" . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`username`='$username',`password`='$password' WHERE `id`='$id'";

    if (mysqli_query($conn, $sql)) {
        echo "<center><h1>User Updated Sucessfully!!!!</h1></center>";
        echo "<script>
                setTimeout(function () {
                    window.location.href = 'dashboard.php?content=usermanagement';
                }, 800);
              </script>";
        exit();
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

