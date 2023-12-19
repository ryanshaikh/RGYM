<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_GET["email"];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
        <title>Reset Password</title>
    </head>
    <body>
        <div class="container">
            <h2>Reset Password</h2>
            <form action="update_password.php" method="post">
                <!-- Add form fields for new password and email -->
                <input type="hidden" name="email" value="<?= $email ?>">
                <div class="mb-3">
                    <label for="newPassword" class="form-label">New Password:</label>
                    <input type="password" class="form-control" name="newPassword" id="newPassword" required />
                </div>
                <center>
                    <button type="submit" class="btn btn-info">Reset Password</button>
                </center>
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
}
?>
