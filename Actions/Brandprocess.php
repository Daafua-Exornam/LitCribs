<?php
// Include necessary files
require('../Controllers/product_controller.php');
require('../Settings/core.php');

// Check if the "Add Brand" button has been clicked
if (isset($_POST['addBrandBttn'])) {
    // Retrieve the brand name from the form
    $brandName = $_POST['bname'];

    // Check if the brand name is not empty
    if (!empty($brandName)) {
        // Call the addBrandCtrlr function to add the brand
        $result = addBrandCtrlr($brandName);

        // Check for duplication (if needed) and set a flag
        // $brands = selectOneBrandCtrlr($brandName);
        // $duplicate = (mysql_num_rows());

        // Check if the brand has been added successfully and redirect to the brand page, otherwise print "Insertion failed"
        $check = ($result == true) ? header("Location: ../Admin/BrandPage.php") : print "Insertion failed";
    }
}

// Check if the "Update Brand" button has been clicked
if (isset($_GET['updateBrandBttn'])) {
    // Retrieve the brand ID and updated brand name from the form
    $brandId = $_GET['brandId'];
    $brandName = $_GET['brandName'];

    // Call the updateBrandCtrlr function to update the brand
    $result = updateBrandCtrlr($brandId, $brandName);

    // Check if the brand has been updated successfully and redirect to the brand page, otherwise print "Update failed"
    $check = ($result == true) ? header("Location: ../Admin/BrandPage.php") : print "Update failed";
}

// Check if the "Delete Brand" button has been clicked
if (isset($_GET['deleteBrandBttn'])) {
    // Retrieve the brand ID and brand name for deletion
    $brandId = $_GET['brandId'];
    $brandName = $_GET['brandName'];

    // Call the deleteBrandCtrlr function to delete the brand
    $result = deleteBrandCtrlr($brandId, $brandName);

    // Check if the brand has been deleted successfully and redirect to the brand page, otherwise print "Delete failed"
    $check = ($result == true) ? header("Location: ../Admin/BrandPage.php") : print "Delete failed";
}
?>
