<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect the user to the "index.php" page
header("location: ../View/index.php");
