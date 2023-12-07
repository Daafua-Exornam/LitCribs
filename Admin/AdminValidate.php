<?php
// Include the connection.php file for database connectivity
include_once('connection.php');

// Function to sanitize and validate input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate the username and password received from the form
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Prepare and execute a database query to retrieve admin login information
    $stmt = $conn->prepare("SELECT * FROM adminlogin");
    $stmt->execute();
    $users = $stmt->fetchAll();

    // Loop through the retrieved users
    foreach($users as $user) {
        // Check if the entered username and password match any user's credentials
        if (($user['username'] == $username) && ($user['password'] == $password)) {
            // If credentials match, redirect to the admin_index.php page
            header("location: ../View/admin_index.php");
        } else {
            // If credentials do not match, display an alert and terminate the script
            echo "<script language='javascript'>";
            echo "alert('WRONG INFORMATION')";
            echo "</script>";
            die();
        }
    }
}
?>
