<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.3.2 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <title>Forgot Password</title>
</head>
<body>

    <div class="container mt-5">
        <h2>Forgot Password</h2>
        <form action="forgot_password.php" method="post">
            <div class="mb-3">
                <label for="forgotPasswordEmail" class="form-label">Enter your email:</label>
                <input
                    type="email"
                    class="form-control"
                    name="email"
                    id="forgotPasswordEmail"
                    required
                />
            </div>
            <center>
                <button type="submit" class="btn btn-info">Click To Reset</button>
            </center>
        </form>
    </div>

    <!-- Bootstrap JavaScript and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
