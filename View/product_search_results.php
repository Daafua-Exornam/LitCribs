<?php
require('../Settings/core.php');
require('../Controllers/product_controller.php');

// Define the number of products to display per page and get the current page from the URL
$productsPerPage = 10;
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Get the search query from the URL
$searchQuery = isset($_GET['search']) ? $_GET['search'] : '';

// Retrieve product search results for the current page
$offset = ($current_page - 1) * $productsPerPage;
$searchResults = searchProductsCtrlr($searchQuery, $productsPerPage, $offset);

// Calculate the total number of search results
$totalResults = countSearchResultsCtrlr($searchQuery);
$totalPages = ceil($totalResults / $productsPerPage);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Search Results</title>
    <link href="../CSS/indexPage.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <!-- NAV BAR STARTS -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">The E-Commerce Site</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../Settings/logout.php">Logout</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="View/cart.php">Cart</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- NAV BAR ENDS>
    
    <!-- The following code displays search results for products -->
    <!-- It lists products matching a search query along with pagination -->
    <!-- The displayed information includes product details and options to view more details and add to the cart -->

    <br>
    <div class="container">
        <!-- Display the title for the search results -->
        <h1 class="text-center">Search Results</h1>
        <!-- Display the search query entered by the user -->
        <p class="text-center">Search Query: <?= $searchQuery ?></p>
        <div class="row">
            <!-- Check if there are matching products in the search results -->
            <?php if (count($searchResults) > 0) : ?>
                <?php foreach ($searchResults as $product) : ?>
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <!-- Display the product image with a link to view more details -->
                            <img src="../Images/Product/<?= $product['product_image'] ?>" class="card-img-top"
                                alt="<?= $product['product_title'] ?>">
                            <div class="card-body">
                                <!-- Display the product title -->
                                <h5 class="card-title"><?= $product['product_title'] ?></h5>
                                <!-- Display the product price -->
                                <p class="card-text">GHC: <?= $product['product_price'] ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <!-- Link to view more details about the product -->
                                        <a href="View/single_product.php?id=<?= $product['product_id'] "
                                            class="btn btn-sm btn-outline-secondary">View More</a>
                                        <!-- Link to add the product to the cart -->
                                        <a href="../Controllers/cart_controller.php?id=<?= $product['product_id'] "
                                            class="btn btn-sm btn-outline-primary">Add to Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <!-- Displayed when no products match the search query -->
                <div class="col-md-12 text-center">
                    <p>No products found for your search query.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Pagination Links -->
    <div class="pagination">
        <!-- Generate pagination links with page numbers and search query -->
        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
            <a href="?page=<?= $page ?>&search=<?= $searchQuery ?>" class="page-link"><?= $page ?></a>
        <?php endfor; ?>
    </div>

    <script src="https://ajax.googleapis.com/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/Product_Search.js"></script>
</body>

</html>
