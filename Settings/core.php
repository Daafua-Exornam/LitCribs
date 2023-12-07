<?php
ob_start(); // Start output buffering to capture and manipulate the output before it's sent to the client's browser.

session_start(); // Start or resume the current session.

$current_file = $_SERVER['SCRIPT_NAME'];
// Retrieve the current script's filename or path. It's used to track the current page being accessed.

function checkLogin()
{
    if (!isset($_SESSION['c_id'])) {
        header('Location: ../Settings/logout.php');
        // Check if the 'c_id' session variable is not set, indicating that the user is not logged in.
        // Redirect to the 'logout.php' page in the 'Settings' directory for logging out.
    }
}

function checkAccess()
{
    if ($_SESSION['user_role'] == 1) {
        return $_SESSION['user_role'];
        // Check if the user has a user role value of 1 (presumably indicating a certain level of access).
        // Return the user's role value.
    }
}
?>