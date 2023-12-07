<?php
// Include necessary files
require('../Controllers/cart_controller.php');
require('../Settings/core.php');

// Set options for the cURL session including the URL, headers, timeout, etc.
$url = "https://api.paystack.co/transaction/initialize";

// Prepare data to be sent as fields in the cURL request
$fields = [
    // $email = $_GET['loginEmail'],     // User's email from the GET request
    // $amount = $_GET['totalAmount'],   // Total amount from the GET request
    // $reference = $_GET['reference'] // (Commented out) - Reference data from the GET request (not used in this section)
];
$fieldsString = http_build_query($fields);

// Initialize cURL session
$ch = curl_init();

// Set cURL options: URL, POST method, POST data, headers, and return the response
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldsString);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    "Authorization: Bearer pk_test_137652acdc1d840095183deb1be0b83535a7748d", // Paystack API key
    "Cache-Control: no-cache",
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the cURL request and get the result
$result = curl_exec($ch);
echo ('payment successful')

// Check if the object has a status property and if it's equal to 'success' (verification was successful)
// if (isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success') {

// Extract customer details and generate order-related information
// $cartId = implode("",$_SESSION['c_id']) ;
// $invoiceNo = mt_rand(100, 1000);
// $paymentDate = date('Y/m/d');
// $orderStatus = 'pending';

// // Add order to the database
// $addOrder = addOrderCtrlr($cartId, $invoiceNo, $paymentDate, $orderStatus);

// if ($addOrder) {
//     // Get the most recent order id
//     $idForOrder = implode("", getAllOrderCtrlr($cartId));

//     // Call a function that stores an array of the customer's details
//     $products = selectAllCartCtrlr($cartId);
//     foreach ($products as $x) {
//         // Add order details to the database
//         $addOrderDetails = addOrderDetailsCtrlr($idForOrder, $x['p_id'], $x['qty']);
//         // Call controller function to insert into the payment table
//         $paymentResults = addPaymentCtrlr($amount, $cartId, $idForOrder, "GHC", $paymentDate);
//     }

//     if ($paymentResults) {
//         $cart = selectAllCartCtrlr($cartId);

//         foreach ($cart as $x) {
//             // Remove products from the cart
//             removeFromCartCtrlr($x['p_id'], $cartId);
//             echo "Payment verified successfully, and insertion complete.";
//         }
//     } else {
//         // Execute post (This seems to be commented out, and there is a missing closing bracket for the if statement)
//         echo $result;
//     }
// }

// Get the response and store
// $response = curl_exec($ch);

// // If there are any errors
// $err = curl_error($ch);

// // Close the session
// curl_close($ch);

// // Convert the response to a PHP object
// $decodedResponse = json_decode($response);
?>
