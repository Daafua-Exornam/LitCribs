<?php
require('../Settings/core.php'); // Include the core.php file from the parent directory.
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin</title>
  <link href="../CSS/MenuNav.css" rel="stylesheet"> <!-- Link to an external CSS file for styling. -->
</head>
<body>
  <!-- Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="topnav" id="navbarContent">
      <!-- Navigation links for the admin menu -->
      <a aria-current="page" href="Login/register.php">Register</a> <!-- Link to the registration page -->
      <a aria-current="page" href="Settings/logout.php">Log Out</a> <!-- Link to the logout functionality -->
      <a aria-current="page" href="../Admin/BrandPage.php">Brand</a> <!-- Link to the brand management page -->
      <a aria-current="page" href="Admin/CategoryPage.php">Add Category</a> <!-- Link to the category management page -->
      <form class="d-flex">
        <!-- Search form in the navigation bar -->
        <input class="form-control me-2" name="search" id="search" type="search" placeholder="Search" aria-label="Search">
        <!-- The input field for performing searches on the website -->
      </form>
    </div>
  </nav>

  <!-- Admin Menu Header -->
  <div style="display: flex; flex-direction: column; justify-content: center; align-items: center; height: 30vh; max-height: 30vh;">
    <h2 style="font-size: 3rem;">Admin Menu</h2> <!-- Display the "Admin Menu" header -->
  </div>

  <!-- Admin Menu Options -->
  <div class="click" id="click">
    <a style="flex-direction: column; justify-content: center;"  href="../Admin/BrandPage.php"> Add Brand</a><br>
    <!-- Link to the page for adding a new brand -->
    <a style="flex-direction: column; justify-content: center;"  href="../Admin/CategoryPage.php"> Add Category</a><br>
    <!-- Link to the page for adding a new category -->
    <a style="flex-direction: column; justify-content: center;"  href="../Admin/ProductPage.php"> Add Product</a><br>
    <!-- Link to the page for adding a new product -->
    <a style="flex-direction: column; justify-content: center;"  href="../Settings/logout.php"> Log Out</a><br>
    <!-- Link to the logout functionality -->
  </div>
</body>
</html>
