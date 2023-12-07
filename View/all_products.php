<?php
// Include necessary files for database and controller access
require('../Settings/core.php');
require('../Controllers/product_controller.php');

// Define the number of products to display per page and get the current page from the URL
$productsPerPage = 10;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
$products = selectAllProductCtrlr();
$totalPages = 2

// // Retrieve products for the current page
// $offset = ($current_page - 1) * $productsPerPage;
// $products = selectProductsByPageCtrlr($productsPerPage, $offset);

// // Calculate the total number of products
// $totalProducts = countAllProductsCtrlr();
// $totalPages = ceil($totalProducts / $productsPerPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata for character set, viewport, and title -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL Products</title>

    <!-- Link to Bootstrap CSS from CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Link to an external CSS file for additional styling -->
    <link rel="stylesheet" type="text/css" href="../CSS/AllProducts.css">
</head>

<body>
    <!-- Navigation Bar Starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <!-- Brand/logo and toggler button for responsive navigation -->
            <a class="navbar-brand" href="#">It's Lit Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation links and search form -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <!-- Logout link -->
                    <li class="nav-item">
                        <a class="nav-link" href="../Settings/logout.php">Logout</a>
                    </li>
                    <!-- Cart link -->
                    <li class="nav-item">
                        <a class="nav-link" href="../View/cart.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar Ends -->

    <!-- Main Content Container -->
    <div class="container">
        <h1 class="text-center">PRODUCTS</h1>
        <div class="row">
            <!-- Loop through each product and display as a card -->
            <?php foreach ($products as $product) : ?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm" style='height:25rem;'>
                        <!-- Product Image -->
                        <img src="../Images/Product/<?= $product['product_image'] ?>"  style= 'height:20rem;' alt="<?= $product['product_title'] ?>">
                        <div class="card-body">
                            <!-- Product Details -->
                            <h5 class="card-title"><?= $product['product_title'] ?></h5>
                            <p class="card-text">GHC: <?= $product['product_price'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <!-- View More and Add to Cart buttons -->
                                    <a href="../View/single_product.php?p_id=<?= $product['product_id'] ?>" class="btn btn-sm btn-outline-secondary">View More</a>
                                    <form action="../Actions/Add_To_Cart.php" method="get">
                                    <input class="form-control" id="qty" name="qty" type="number" placeholder="Enter quantity">
                                    <input type="hidden" name="p_id" value="<?= $product['product_id'] ?>">
                                    <button type="submit" class="btn btn-sm btn-outline-primary">Add to Cart</button>
                                     </form>
                                   <!-- <?php 
                                    // Check if the removal operation was successful
                                    // if($done){
                                    // // If successful, redirect to the customer cart page
                                //     header('location: ../View/cart.php');
                                //  }
                                 ?> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="pagination">
        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
            <!-- Generate pagination links -->
            <a href="?page=<?= $page ?>" class="page-link"><?= $page ?></a>
        <?php endfor; ?>
    </div>

    <!-- Include jQuery and Product Search script -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/Product_Search.js"></script>
</body>

</html>
