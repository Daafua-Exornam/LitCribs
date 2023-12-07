<?php
// Include necessary files for cart operations
require('../Controllers/cart_controller.php');
require('../Settings/core.php');

// Check if product ID ('p_id') and cart ID ('c_id') are set in the URL,
// and if they are numeric
if (isset($_POST['p_id'], $_SESSION['c_id']) ) {

    // Extract product ID and cart ID from the URL parameters
    $prodId = $_POST['p_id'];
    $cartId = $_SESSION['c_id']; // Assuming the cart ID is stored in the session

    // Call the removeFromCartCtrlr function to remove the specified product from the cart
    $done = removeFromCartCtrlr($prodId, $cartId);

    // Check if the removal operation was successful
    if($done){
        // If successful, redirect to the customer cart page
        header('location: ../View/cart.php');
    }
}
?>
