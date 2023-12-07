<?php
// Include the product processing file
include('../Actions/ProductProcess.php');

// Retrieve product information based on the provided 'product_id' from the URL
$product = selectOneProductCtrlr($_GET['p_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Set document metadata -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Set the title of the page based on the product title -->
  <title>View More - <?php echo $product['product_title']; ?></title>

  <!-- Include the external stylesheet -->
  <link href="../CSS/indexPage.css" rel="stylesheet">
</head>

<body>
  <!-- Navigation bar section starts -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="click" id="click">
      <!-- Button to go back in history -->
      <button onclick="history.back()">Go Back</button>
    </div>

    <div class="topnav" id="navbarSupportedContent">
      <!-- Link to logout page -->
      <a aria-current="page" href="../Settings/logout.php">Logout</a>

      <!-- Search form -->
      <form class="d-flex">
        <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
      </form>
    </div>
  </nav>
  <!-- Navigation bar section ends -->

  <!-- Product information display section starts -->
  <div class="card" class='card col-md-4" style="width: 18rem;">
    <!-- Display product image -->
    <img src="../Images/Product/<?php echo htmlentities($product['product_image']); ?>" width="200" height="200" class="card-img-top" alt="Product Image">
    <div class="card-body">
      <!-- Display product title, price, category, brand, and description -->
      <h5 class="card-title"><?php echo $product['product_title']; ?></h5>
      <p class="card-text">GHC: <?php echo $product['product_price']; ?></p>
      <p class="card-text">Category: <?php echo $product['cat_name']; ?></p>
      <p class="card-text">Brand: <?php echo $product['brand_name']; ?></p>
      <p class="card-text">Description: <?php echo $product['product_desc']; ?></p>
      <p class="card-text">Keywords: <?php echo $product['product_keywords']; ?></p>

      <!-- Add to cart button with hidden form fields to send data to add_to_cart.php -->
      <form action="add_to_cart.php" method="post">
        <!-- Hidden fields to pass product data -->
        <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
        <input type="hidden" name="product_title" value="<?php echo $product['product_title']; ?>">
        <input type="hidden" name="product_price" value="<?php echo $product['product_price']; ?>">
        <!-- Button to submit the form and add the product to the cart -->
        <button type="submit" class="btn btn-primary">Add to Cart</button>
      </form>
    </div>
  </div>
</body>

</html>
