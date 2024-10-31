<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Funiro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Poppins', serif;
            font-size: large;
        }
    </style>
</head>

<?php
include '../eshop/database/connect.php';
?>

<body>
    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container-sm d-flex justify-content-center ">
            <div class="d-flex align-items-center">
                <img src="assets/Meubel House_Logos-05.jpg" alt="Logo" />
                <a class="navbar-brand ml-4" href="#">
                    <strong class="logo-text">
                        Funiro
                    </strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="?page=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=shop">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="collapse navbar-collapse ">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item" id="login-button">
                        <a class="nav-link" href="?page=login" aria-label="User Profile">
                            <i class="bi bi-person-gear"></i>
                        </a>
                    </li>
                    <li class="nav-item" id="logout-button">
                        <a class="nav-link" href="./index.php" aria-label="Log Out">
                            <i class="bi bi-box-arrow-left"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" onclick="onSearchClick()" aria-label="Search">
                            <i class="bi bi-search"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?section=favorites" aria-label="Favorites">
                            <i class="bi bi-heart"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?section=cart" aria-label="Shopping Cart">
                            <i class="bi bi-cart2"></i>
                        </a>
                    </li>
                </ul>


            </div>
        </div>
    </nav>
    <?php
    // Check if a page is specified in the query parameter
    $page = isset($_GET['page']) ? $_GET['page'] : 'home';

    // Conditionally load the appropriate content
    switch ($page) {
        case 'home':
            include '../eshop/pages/home.php';  // Make a separate file for home content
            break;
        case 'shop':
            include '../eshop/pages/shop.php';  // This loads shop.php only if page=shop
            break;
        case 'about':
            include '../eshop/pages/about.php';
            break;
        case 'contact':
            include '../eshop/pages/contact.php';
            break;
        case 'login':
            include '../eshop/pages/login.php';
            break;
        default:
            echo "<p>Page not found.</p>";
    }
    ?>

    <hr>
    <!-- Footer -->
    <footer class="container my-5">
        <div class="row">
            <div class="col-12 col-md-4 mb-4">
                <strong>Funiro</strong>
                <p>268 Ly Thuong Kiet, Ward 6, District 10, Ho Chi Minh City, Vietnam</p>
            </div>

            <div class="col-6 col-md-2">
                <p class="secondary-text">Links</p>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=home" aria-current="page"><strong>Home</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="?page=shop" aria-current="page"><strong>Shop</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=about"><strong>About</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact"><strong>Contact</strong></a>
                    </li>
                </ul>

            </div>

            <div class="col-6 col-md-2">
                <p class="secondary-text">Help</p>
                <ul class="navbar-nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#" aria-current="page"><strong>Payment Options</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><strong>Returns</strong></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><strong>Privacy Policies</strong></a>
                    </li>
                </ul>
            </div>

            <div class="col-12 col-md-4">
                <p class="secondary-text">Newsletter</p>
                <form>
                    <div class="mb-3 d-flex">
                        <input type="email" class="form-control" name="newsletter-subscription" id="form-email"
                            aria-describedby="emailHelpId" placeholder="abc@mail.com" />
                        <button type="submit" class="newsletter-btn">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <hr>

        <div class="container my-5">
            <p>© 2023 furino. All rights reverved.</p>
        </div>
    </footer>
    <script src="main.js"></script>
</body>

</html>