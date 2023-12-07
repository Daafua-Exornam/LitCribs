<?php
// Include necessary files and initialize session
require('../Settings/core.php');
require('../controllers/cart_controller.php');

// Get the total amount from the URL parameter
$amount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : 0;
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Meta tags for responsiveness -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Page title and external CSS and JS links -->
    <title>Proceed To Payment</title>
    <link rel="stylesheet" href="../CSS/to be added.css">
    <link rel="stylesheet" href="../CSS/to be added.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z"
        crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="">
        <div class="topnav" id="navbarContent">
            <!-- Logout link -->
            <a class="nav-link active" aria-current="page" href="../Settings/logout.php">Logout</a>

            <!-- Shopping cart icon link -->
            <div class="link-icons">
                <a href="../View/cart.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
        </div>
    </nav>
    <br><br>

    <!-- Bootstrap JS script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Main container with payment form -->
    <div class="container">
        <form id="paymentForm">
            <!-- Email input -->
            <div class="mb-3">
                <form method="GET" action="">
                    <label for="inputEmail" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="loginEmail" name="loginEmail"
                        aria-describedby="emailHelp">
                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>

            <!-- Amount input -->
            <div class="mb-3">
                <label for="Total Amount" class="form-label">Amount</label>
                <input type="text" class="form-control" id="amount" name="amount" value="<?= $amount ?>" />
            </div>

            <!-- Checkbox for additional information -->
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>

            <!-- Button to trigger payment process -->
            <button type="button" class="btn btn-primary" onclick="payWithPaystack()">Pay Now</button>
        </form>

        <!-- Button to get the total amount -->
        <button type="submit" class="btn btn-primary" onclick="openPopup()">Get Total Amount</button>

        <!-- Popup for displaying total amount -->
        <div class="popup" id="popup">
            <h3>Total Amount is: </h3>
            <!-- Input field for displaying total amount (readonly) -->
            <input type="text" class="form-control" id="totalAmount" name="totalAmount" value="<?= $amount ?>"
                readonly>
            <!-- Button to copy the total amount to clipboard -->
            <button type="button" class="btn btn-primary" onclick="copyAmount()">Copy Amount</button>
        </div>
    </div>

    <!-- Script to handle popup functionality -->
    <script>
        let popup = document.getElementById("popup");

        // Function to open the popup
        function openPopup() {
            popup.classList.add("open-popup")
        }

        // Function to copy the total amount to clipboard
        function copyAmount() {
            /* Get the text field */
            var copyText = document.getElementById("totalAmount");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            navigator.clipboard.writeText(copyText.value);

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);

            // Close the popup
            popup.classList.remove("open-popup")
        }
    </script>

    <!-- PAYSTACK INLINE SCRIPT -->
    <script src="https://js.paystack.co/v1/inline.js"></script>
    <script src="../JS/Paystack.js"></script>
</body>

</html>
