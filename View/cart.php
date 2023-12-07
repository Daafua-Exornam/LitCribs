<?php
// Include necessary files
require('../Settings/core.php');
require('../Controllers/cart_controller.php');

// Check if a Customer ID is provided in the URL
if (isset($_SESSION['c_id'])) {
    // Retrieve product details by calling the selectOneProductCtrlr function
    $products = selectAllCartCtrlr($_SESSION['c_id']);
} else {
    // Handle the case where no product ID is provided
    // You may redirect the user to another page or show an error message
    exit('Product ID not provided');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Metadata for character set, viewport, and title -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details & Shopping Cart</title>

    <!-- Link to Bootstrap CSS from CDN for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Link to an external CSS file for additional styling -->
    <link rel="stylesheet" href="../CSS/CartPage.css">
</head>

<body>

    <!-- Navigation Bar Starts -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Brand/logo and toggler button for responsive navigation -->
            <a class="navbar-brand" href="#">Shoppn Lab</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation links and search form -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Logout link -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../Settings/logout.php">Logout</a>
                    </li>
                </ul>
                <!-- Search form -->
                <form class="d-flex">
                    <input class="form-control me-2" name="search" id="searcher" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
    </nav>
    <!-- Navigation Bar Ends -->

    <!-- Main Content Container -->
    <div class="container mt-4">
        <!-- Product Details Card -->
        <?php $sum= 0?>
        <div class="row " >
        <?php foreach ($products as $product) : ?>


        <div class="card col-md-4 m-5" style="width: 20rem; height: inherit;" >
            <img src="../Images/Product/<?= $product['product_image'] ?>" class="card-img-top " style='height:30%' alt="<?= $product['product_title'] ?>">
            <div class="card-body">
                <!-- Product Details -->
                <h5 class="card-title"><?php echo $product['product_title'] ?></h5>
                <div style="display:flex;">
                    <p class="card-text">GHC: <?php echo $product['product_price'] ?></p> 
                     <p class="card-text px-4">Quantity: <?php echo $product['qty'] ?></p>
                </div>      
                <p class="card-text">Category: <?php echo $product['product_cat'] ?></p>
                <p class="card-text">Brand: <?php echo $product['product_brand'] ?></p>
                <p class="card-text">Description: <?php echo $product['product_desc'] ?></p>
            
            <!-- Form for remove from cart -->
            <form method="POST" action='../actions/Remove_From_Cart.php'>
                <input type="hidden" name="p_id" value=<?php echo $product['product_id'] ?>>
                <input class="form-control" id="qty" name="qty" type="number" placeholder="Update quantity">
                <input type="submit" value="Remove from Cart" class='btn btn-primary' name='RemoveFromCart'>
            </form>
        </div>
        </div>
<!-- 
            Write logic to update the quantity -->

            <?php
            $sum= $sum+ ($product['product_price']*$product['qty'])
            ?>
            <?php endforeach ?>
        

        
             
        </div>

        <!-- Cart Items Section -->
        <!-- <div class="cart-items mt-4">
            <!-- Product in Cart - Example -->
            <!-- <div class="cart-item"> -->
             <!-- Product Details -->
            <!-- <h5 class="card-title"><?php echo $product['product_title'] ?></h5>
                <p class="card-text">GHC: <?php echo $product['product_price'] ?></p>
                <p class="card-text">Category: <?php echo $product['cat_name'] ?></p>
                <p class="card-text">Brand: <?php echo $product['brand_name'] ?></p>
                <p class="card-text">Description: <?php echo $product['product_desc'] ?></p>
                <button>Update</button>
                <button>Remove</button>
            </div> -->


            <!-- Add more products here -->
        
        <div class="container">
            <form method="GET" action="../View/payment_page.php">
                <div class="form-group col-md-2 mb-3">
                    <label for="totalAmount" class="form-label">Total Amount</label>
                    <input type="text" class="form-control" id="totalAmount" name="totalAmount" value="<?= $sum ?>" readonly>
                </div>
            </form>    

        <!-- Cart Options -->
        <div class="cart-options mt-4">
            <a href='all_products.php'>Continue Shopping</a>
            <!-- <a href ="Payment_Page.php">Proceed to Payment </a> -->
            <form action="Payment_Page.php" method="get">
            <input type="hidden" class="form-control" id="totalAmount" name="totalAmount" value="<?= $sum ?>" readonly>
                <input type="hidden" name="p_id" value="<?= $product['product_id'] ?>">
                <button type="submit" class="btn btn-sm btn-outline-primary">Proceed to Payment</button>
            </form>
        </div>
    </div>


    <!-- JavaScript script for updating quantities and removing items -->
    <!-- <script type="text/javascript" src="../JS/CartActions.js"></script> -->

    <!-- Bootstrap JS script from CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
