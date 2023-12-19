<?php
// admin/TrialRequests.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rgym";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Database not connected: " . mysqli_connect_error());
}

$sql = "SELECT * FROM trialrequest";
$result = mysqli_query($conn, $sql);
$freetrialData = mysqli_fetch_all($result, MYSQLI_ASSOC);

mysqli_close($conn);
?>


<!doctype html>
<html lang="en">
  <head>
    <title>Admin Dashboard - Trial Requests</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>

  <body>
    <header>
      <!-- place navbar here -->
    </header>
    <main>

      <div class="container-fluid">
    <h4 class="text-center mt-4">Trial Requests</h4>
    <div class="table-responsive">
    <table class="table table-bordered table-sm">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Phone</th>
          <th>Message</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($freetrialData as $entry) : ?>
          <tr>
            <td><?php echo $entry['id']; ?></td>
            <td><?php echo $entry['name']; ?></td>
            <td><?php echo $entry['email']; ?></td>
            <td><?php echo $entry['phone']; ?></td>
            <td class="text-break"><?php echo $entry['message']; ?></td>
            <td>
                <a href="trial_mail_template.php?id=<?php echo $entry['id']; ?>" class="btn btn-primary">Mail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
        </div>
  </div>

    </main>
    <footer>
      <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
