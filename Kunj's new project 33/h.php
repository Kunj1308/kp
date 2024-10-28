<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: log.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SP - Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css"> <!-- Link to your main CSS file -->
</head>
<body>
    <!-- Main container -->
    <div class="main">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo" href="#">SP</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="h.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="service.php">Service</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="g.php">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="c.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="history2.php">Client History</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-danger" href="logout.php">Log out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Content Section -->
        <div class="content text-center">
            <h1>Web Design & <br><span>Development</span> <br>Course</h1>
            <button class="btn btn-warning mt-3">
                <a href="contact.html" class="text-dark text-decoration-none">Contact Us</a>
            </button>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
