<?php
// Connect to the database class

// Initialize the database connection variable
 $conn = "";
  
try {
    // Database connection details
    $servername = "localhost";
    $dbname = "shoppn";
    $username = "root";
    $password = "";

    // Create a new PDO database connection
    $conn = new PDO(
        "mysql:host=$servername; dbname=shoppn",
        $username, $password
    );

    // Set PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
    // Handle connection errors and display an error message
    echo "Connection failed: " . $e->getMessage();
}
?>
