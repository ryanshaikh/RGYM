<!-- header.php -->

<!-- Session -->
<?php 
session_start();

$uname = $_SESSION["uname"];
$pass = $_SESSION["pass"];

if (!isset($uname) && !isset($pass)) {
  header("Location: index.html");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />

    <!-- Internal Styling -->
    <style>
        footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            background-color: #333333;
            text-align: center;
            padding: none;
            color: #495057;
        }

        .navbar-nav {
            margin-left: auto;
        }

        .content-container {
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">Admin Dashboard</a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="?content=messages">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?content=TrialRequests">Trial Requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?content=usermanagement">User Management</a>
                        </li>
                    </ul>
                    <form action="logoutd.php" method="post" class="d-flex">
                        <button type="submit" class="btn btn-outline-light">Logout</button>
                    </form>
                </div>
            </div>
        </nav>
    </header>
    <main>
