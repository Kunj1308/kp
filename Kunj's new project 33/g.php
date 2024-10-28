<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location:log.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SP</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="g.css"> <!-- Link to your main CSS file -->
</head>
<body>
    <!-- Main container -->
    <div class="main">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo">SP</a>
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
                            <a class="nav-link" href="g.html">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="c.html">Contact Us</a>
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

        <!-- Carousel Section -->
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="image1.jpg" class="d-block w-100" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img src="image2.jpg" class="d-block w-100" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img src="image3.jpg" class="d-block w-100" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Bootstrap JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
