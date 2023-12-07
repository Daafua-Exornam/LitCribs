<?php
// Include necessary files
require('../Controllers/product_controller.php');
require('../Settings/core.php');

// Authentication and access control 

/* Add Category */
// Check if the "Add Category" button has been clicked
if (isset($_POST['addCaterBttn'])) {
    // Retrieve the category name from the form
    $categName = $_POST['cname'];

    // Ensure the category name is not empty
    if (!empty($categName)) {
        // Call the controller to add the category
        $result = addCatergoryCtrlr($categName);

        // Check if the category was added successfully and redirect to the category page; otherwise, print "Insertion failed"
        $check = ($result == true) ? header("Location: ../Admin/CategoryPage.php") : print "Insertion failed";
    }
}

/* Update Category */
// Check if the "Update Category" button has been clicked
if (isset($_GET['updateCategoryBttn'])) {
    // Retrieve the category ID and name from the form
    $categId = $_GET['categId'];
    $categName = $_GET['categName'];

    // Call the controller to update the category
    $result = updateCategoryCtr($categId, $categName);

    // Check if the category was updated successfully and redirect to the category page; otherwise, print "Update failed"
    $check = ($result == true) ? header("Location: ../Admin/CategoryPage.php") : print "Update failed";
}

/* Delete Category */
// Check if the "Delete Category" button has been clicked
if (isset($_GET['deleteCategoryBttn'])) {
    // Retrieve the category ID and name from the form
    $categId = $_GET['categId'];
    $categName = $_GET['categName'];

    // Call the controller to delete the category
    $result = deleteCategoryCtrlr($categId, $categName);

    // Check if the category was deleted successfully and redirect to the category page; otherwise, print "Delete failed"
    $check = ($result == true) ? header("Location: ../Admin/CategoryPage.php") : print "Delete failed";
}
?>
