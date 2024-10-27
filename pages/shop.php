<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .product-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .product-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="position-relative text-center">
            <img src="assets/shop-page-bg.png" alt="main-bg" class="img-fluid">
            <p class="position-absolute top-50 start-50 translate-middle text-black fw-bold fs-2">Shop</p>
        </div>
    </div>
    <div class="row">
        <?php
        // Sample product data
        $products = [
            ['name' => 'Product 1', 'price' => '$19.99', 'image' => 'assets/product1.jpg'],
            ['name' => 'Product 2', 'price' => '$29.99', 'image' => 'assets/product2.jpg'],
            ['name' => 'Product 3', 'price' => '$39.99', 'image' => 'assets/product3.jpg']
        ];

        // Display each product
        foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card product-card mb-4">
                    <img src="<?php echo $product['image']; ?>" class="card-img-top" alt="<?php echo $product['name']; ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['price']; ?></p>
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>