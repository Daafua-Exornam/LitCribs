<?php
// Include required files
require('../Settings/core.php');
require('../Controllers/product_controller.php');

// Check user login status

/* Add Product */
// If the "Add Product" button has been clicked, process the form data and pass it to the add product controller
if (isset($_POST['addProductBttn'])) {
    // Get data from the form
    $prodCat = $_POST['prodCat'];
    $prodBrand = $_POST['prodBrand'];
    $prodTitle = $_POST['prodTitle'];
    $prodPrice = $_POST['prodPrice'];
    $prodDesc = $_POST['prodDesc'];

    // Move the uploaded image to the product images folder
    $ImgDestination = "../Images/Product/";
    $prodImage = basename($_FILES['prodImage']['name'][0]);
    $ImgPath = $ImgDestination . $prodImage;
    $types = array('jpg', 'png', 'jpeg');
    move_uploaded_file($_FILES['prodImage']['tmp_name'][0], $ImgPath);

    $prodKeyW = $_POST['prodKeyW'];

    // Call the add product controller and store the result
    $result = addProductCtrlr($prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW);

    // Check if the product information has been successfully added and redirect to the product page, or print "Insertion failed"
    $check = ($result == true) ? header("Location: ../Admin/ProductPage.php") : print "Insertion failed";
}

/* Update Product */
// If the "Update Product" button has been clicked, process the form data and pass it to the update product controller
if (isset($_GET['updateProductBttn'])) {
    $prodId = $_GET['prodId'];
    $prodCat = $_GET['prodCat'];
    $prodBrand = $_GET['prodBrand'];
    $prodTitle = $_GET['prodTitle'];
    $prodPrice = $_GET['prodPrice'];
    $prodDesc = $_GET['ProdDesc'];
    $prodImage = $_FILES['prodImage']['name'];
    move_uploaded_file($_FILES["prodImage"]["tmp_name"], "../Images/Products/" . $_FILES["prodImage"]["name"]);
    $prodKeyW = $_GET['prodKeyW'];

    // Call the update product controller and store the result
    $result = updateProductCtrlr($prodId, $prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW);

    // Check if the product information has been successfully updated and redirect to the product page, or print "Update failed"
    $check = ($result == true) ? header("Location: ../Admin/ProductPage.php") : print "Update failed";
}

/* Delete Product */
// If the "Delete Product" button has been clicked, process the form data and pass it to the delete product controller
if (isset($_GET['deleteProductBttn'])) {
    $prodId = $_GET['prodId'];
    $prodCat = $_GET['prodCat'];
    $prodBrand = $_GET['prodBrand'];
    $prodTitle = $_GET['prodTitle'];
    $prodPrice = $_GET['prodPrice'];
    $prodDesc = $_GET['prodDesc'];
    $prodImage = $_FILES['prodImage']['name'];
    move_uploaded_file($_FILES["prodImage"]["tmp_name"], "../Images/Product/" . $_FILES["prodImage"]["name"]);
    $prodKeyW = $_GET['prodKeyW'];

    // Call the delete product controller and store the result
    $result = deleteProductCtrlr($prodId);

    // Check if the product has been successfully deleted and redirect to the product page, or print "Delete failed"
    $check = ($result == true) ? header("Location: ../Admin/ProductPage.php") : print "Delete failed";
}
?>
