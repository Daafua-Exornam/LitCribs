<?php
// Include necessary files for database and controller access
require('../Settings/core.php');
require('../Controllers/product_controller.php');

// Call the function to check user login and determine if access should be granted or denied
// Commented out as it's not being used in this code snippet. still looking at it
// checkLogin();
// $admin = checkAccess() != 1 ? header("Location: ../View/customer_index.php") : print "Access Denied";
?>

<!-- Form for the product page -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link href="../CSS/ProductPage.css" rel="stylesheet">
</head>

<body>
    <h2>PRODUCT MANAGEMENT</h2>
    
    <!-- NAVIGATION BAR STARTS -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="click" id="click">
            <button onclick="history.back()">Go Back</button>
        </div>
        <div class="topnav" id="navbarSupportedContent">
            <a aria-current="page" href="../Admin/BrandPage.php">Add Brand</a>
            <a aria-current="page" href="../Admin/CategoryPage.php">Add Category</a>
            <a aria-current="page" href="../Settings/logout.php">Logout</a>
        </div>
    </nav>

    <br><br><br><br>
    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th></th>
                    <th>Product Category</th>
                    <th>Product Brand</th>
                    <th>Product Title</th>
                    <th>Product Price</th>
                    <th>Product Desc</th>
                    <th>Product Image</th>
                    <th>Product Keywords</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Form for adding a new product -->
                <form method="POST" action="../Actions/ProductProcess.php" enctype="multipart/form-data">
                    <tr>
                        <td>
                            <input type='hidden' name='prodId' value="<?php echo $x['product_id'] ?>">
                        </td>
                        <td>
                            <!-- Dropdown for selecting product category -->
                            <select class="form-control" name="prodCat" aria-label="Default select example" required="required">
                                <option value="">--Select Product Category--</option>
                                <?php
                                // Fetch all product categories from the controller and populate the dropdown
                                $products = selectAllCategoriesCtrlr();
                                foreach ($products as $x) {
                                ?>
                                    <option value="<?php echo $x['cat_id']; ?>"><?php echo $x['cat_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <!-- Dropdown for selecting product brand -->
                            <select class="form-control" name="prodBrand" aria-label="Default select example" required="required">
                                <option value="">--Select Product Brand--</option>
                                <?php
                                // Fetch all product brands from the controller and populate the dropdown
                                $products = selectAllBrandsCtrlr();
                                foreach ($products as $x) {
                                ?>
                                    <option value="<?php echo $x['brand_id']; ?>"><?php echo $x['brand_name']; ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <!-- Input field for product title -->
                            <input class="form-control" type="text" placeholder="Product Name" name="prodTitle" aria-required="true" required="required">
                        </td>
                        <td>
                            <!-- Input field for product price -->
                            <input class="form-control" type="text" placeholder="Product Price" name="prodPrice" aria-required="true" required="required">
                        </td>
                        <td>
                            <!-- Input field for product description -->
                            <input class="form-control" type="text" placeholder="Product Description" name="prodDesc" aria-required="true" pattern="^[-\sa-zA-Z]+$" required="required">
                        </td>
                        <td>
                            <!-- Input field for product image -->
                            <input class="form-control" type="file" placeholder="Product Image" name="prodImage[]"  aria-required="true" required="required" accept="image/*">
                        </td>
                        <td>
                            <!-- Input field for product keywords -->
                            <input class="form-control" type="text" placeholder="Product Keywords" name="prodKeyW" aria-required="true" pattern="^[-\sa-zA-Z]+$" required="required">
                        </td>
                        <td class="click" id="click">
                            <!-- Submit button for adding a new product -->
                            <button type="submit" name="addProductBttn">Add Product</button>
                        </td>
                        
                    </tr>
                </form>

                <!-- Form for updating and deleting products -->
                <form method="GET" action="../Actions/ProductProcess.php" id="form">
                    <?php
                    // Fetch all products from the controller and populate the table for updating and deleting
                    $products = selectAllProductCtrlr();
                    foreach ($products as $x) {
                    ?>
                        <tr>
                            <td>
                                <input type='hidden' name='prodId' value="<?php echo $x['product_id'] ?>">
                            </td>
                            <td name='prodCat'><?php echo $x['product_cat'] ?></td>
                            <td name='prodBrand'><?php echo $x['product_brand'] ?></td>
                            <td>
                                <!-- Input field for updating product title -->
                                <input type='text' name='prodTitle' value="<?php echo $x['product_title'] ?>">
                            </td>
                            <td>
                                <!-- Input field for updating product price -->
                                <input type='text' name='prodPrice' value="<?php echo $x['product_price'] ?>">
                            </td>
                            <td>
                                <!-- Input field for updating product description -->
                                <input type='text' name='ProdDesc' value="<?php echo $x['product_desc'] ?>">
                            </td>
                            <td>
                                <!-- Input field for updating product image -->
                                <input class="form-control" type="file" placeholder="Product Image" name="prodImage[]"   accept="image/*">  
                                <img src='../Images/Product/<?php  echo $x["product_image"]  ?>' alt='...'> 

                            </td>
                            <td>
                                <!-- Input field for updating product keywords -->
                                <input type='text' name='prodKeyW' value="<?php echo $x['product_keywords'] ?>">
                            </td>
                            <td class="click" id="click">
                                <!-- Submit button for updating product details -->
                                <button type="submit" name="updateProductBttn">Update</button>
                            </td>
                            <td class="click" id="click">
                                <!-- Submit button for deleting a product -->
                                <button type="submit" name="deleteProductBttn">Delete</button>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </form>
            </tbody>
        </table>
        <!-- <script src="../JS/CustomerValidation.js">
            document.getElementById('upload-image').addEventListener('click', function() {
            document.getElementById('file-input').click();
            });

            document.getElementById('file-input').addEventListener('change', function() {
  console.log('File uploaded:', this.files[0]);
}); -->
        </script>
    </div>
</body>
</html>
