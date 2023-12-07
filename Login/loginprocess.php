<?php

require('../Controllers/customer_controller.php');
// Include the customer controller file to access functions and data related to customers.

if (isset($_POST['loginButton'])) {
    // Check if the 'loginButton' POST parameter is set, indicating that a login form was submitted.

    $email = $_POST['loginEmail'];
    $userPword = $_POST['loginPass'];
    // Retrieve user-provided email and password from the form.

    $result = getLoginController($email);
    // Call a function to retrieve customer data based on the provided email.

    $data = $result['customer_pass'];
    // Extract the hashed password from the retrieved customer data.

    $verify = password_verify($userPword, $data);
    // Verify the provided password against the hashed password.

    if ($result) {
        // Check if customer data was successfully retrieved.

        if ($verify) {
            // Check if the password verification is successful.

            session_start();
            // Start a new session for managing user data.

            $_SESSION['user_role'] = $result['user_role'];
            $_SESSION['c_id'] = $result['customer_id'];
            // Store user role and customer ID in the session.

            if ($result['user_role'] == 1) {
                // If the user role is 1 (presumably indicating an admin role), redirect to the admin index page.
                header("Location: ../View/all_products.php");
            } else {
                // If the user role is not 1, redirect to the customer index page.
                header("Location: ../View/admin_index.php");
            }
        } else {
            // Password verification failed, indicating incorrect login credentials.
            echo "Verification login failed.";
        }
    } else {
        // Customer data retrieval failed, indicating a failed login attempt.
        echo "Login failed.";
    }
} else {
    // The 'loginButton' POST parameter is not set, suggesting that the login form was not submitted.
    echo "Login form not submitted.";
}

?>