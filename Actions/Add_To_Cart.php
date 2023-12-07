<?php
// Include necessary files for cart operations
require("../Controllers/cart_controller.php");
require('../Settings/core.php');

// Check if product ID ('p_id') and quantity ('qty') are set in the URL,
// and if they are numeric
// exit ($_GET['qty']);
if (isset($_GET['p_id']))
// , $_GET['qty']) && is_numeric($_GET['p_id']) && is_numeric($_GET['qty'])) {
    //if (isset($_GET['id'])) {

    // Extract product ID, quantity, IP address, and cart ID from the URL parameters
   { $p_id = $_GET['p_id'];
    $qty = $_GET['qty'];
    $ip_add = $_SERVER['REMOTE_ADDR'];
    $cartId = $_SESSION['c_id'];
    

    // Check if a product already exists in the cart
    $inCart = selectOneCartCtrlr($cartId, $p_id);

    // If the product is already in the cart and the quantity is greater than 0
    if ($inCart && $qty > 0) {
        // Check if the cart ID is an array
        if ($cartId && is_array($cartId)) {
            // Check if the product ID exists in the cart array
            if (array_key_exists($p_id, $cartId)) {
                // Product exists in the cart, so just update the quantity
                $cartId[$qty] += $qty;
            } else {
                // Product is not in the cart, so add it
                $result = addToCartCtrlr($p_id, $ip_add, $cartId, $qty);
            }
        } else {
            // If the product does not already exist in the cart, add it
            $result = addToCartCtrlr($p_id, $ip_add, $cartId, $qty);
        }
    } else {
        // If the product is not in the cart or the quantity is not greater than 0, add it to the cart
        $result = addToCartCtrlr($p_id, $ip_add, $cartId, $qty);
    }

    // Check if the addition operation was successful
    if ($result) {
        // If successful, redirect to the customer cart page
        header('location: ../View/cart.php');
    }

    // Assign the cart ID to the session variable 'id'
    $_SESSION['id'] = $cartId;

    //}
}
?>
