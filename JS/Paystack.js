// PAYMENT FUNCTION
function payWithPaystack() {


    // Set up PaystackPop handler
    let handler = PaystackPop.setup({
        key: 'pk_test_137652acdc1d840095183deb1be0b83535a7748d', 
        // email: document.getElementById("loginEmail").value,
        amount: document.getElementById("totalAmount").value * 100, // Convert amount to kobo (Paystack uses kobo as the base currency unit)
        currency: 'GHS',
        // ref: 'YOUR_REFERENCE', // Replace with a reference you generated (This line is commented out)
        onClose: function () {
            // Callback function when the payment popup is closed
            alert('Transaction was not completed.');
        },
        callback: function (response) {
            // Callback function when payment is successful

            // Send email, amount, and reference to our server using AJAX
            $.ajax({
                url: '../View/all_products.php',
                method: "get",
                     data: {
                //     'email': document.getElementById("loginEmail").value,
                //     'amount': document.getElementById("totalAmount").value,
                //     'reference': response.reference
                },
                success: function (response) {
                    // Callback function when AJAX request is successful
                    alert(response);
                },
                error: function (error) {
                    // Callback function when AJAX request encounters an error
                    alert('error');
                }
            });
        },
    });

    // Open the Paystack iframe for payment
    handler.openIframe();
}
