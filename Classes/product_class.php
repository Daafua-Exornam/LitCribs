<?php

// Require the 'db_class.php' file to access the database connection
require('../Settings/db_class.php');

// Create a class named 'Product' that extends 'DbConnection' to handle product-related operations
class Product extends DbConnection {

    //--INSERT--//

    // Function to add a new product to the database
    function addProduct($prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW) {
        // Execute a SQL query to insert a new product with the provided information
        return $this->query("INSERT INTO products( product_title, product_cat, product_brand, product_price, product_desc, product_image, product_keywords) values('$prodTitle', '$prodCat', '$prodBrand','$prodPrice','$prodDesc','$prodImage','$prodKeyW')");
    }

    // Function to add a new category to the database
    function addCategory($categName) {
        // Execute a SQL query to insert a new category with the provided name
        return $this->query("INSERT INTO categories(cat_name) values('$categName')");
    }

    // Function to add a new brand to the database
    function addBrand($brandName) {
        // Execute a SQL query to insert a new brand with the provided name
        return $this->query("INSERT INTO brands(brand_name) values('$brandName')");
    }

    //--SELECT--//

    // Function to select and retrieve details of a single product based on its ID
    function selectOneProduct($prodId) {
        // Execute a SQL query to select a product and its associated brand and category using a join operation
        return $this->fetchOne("SELECT * FROM products INNER JOIN brands ON product_brand = brand_id INNER JOIN categories ON product_cat = cat_id WHERE product_id='$prodId'");
    }

    // Function to select and retrieve details of a single category based on its ID
    function selectOneCategory($categId) {
        // Execute a SQL query to select a category based on its ID
        return $this->fetchOne("SELECT * FROM categories WHERE cat_id='$categId'");
    }

    // Function to select and retrieve details of all products in the database
    function selectAllProducts() {
        // Execute a SQL query to select all products
        return $this->fetch("SELECT * FROM products");
    }

    // Function to select and retrieve details of all categories in the database
    function selectAllCategories() {
        // Execute a SQL query to select all categories
        return $this->fetch("SELECT * FROM categories");
    }

    // Function to select and retrieve details of all brands in the database
    function selectAllBrands() {
        // Execute a SQL query to select all brands
        return $this->fetch("SELECT * FROM brands");
    }

    // Function to select and retrieve details of a single brand based on its ID
    function selectOneBrand($brandId) {
        // Execute a SQL query to select a brand based on its ID
        return $this->fetchOne("SELECT * FROM brands WHERE brand_id='$brandId'");
    }

    //--UPDATE--//

    // Function to update the details of a single product based on its ID
    function updateOneProduct($prodId, $prodTitle, $prodCat, $prodBrand, $prodPrice, $prodDesc, $prodImage, $prodKeyW) {
        // Execute a SQL query to update the product information based on its ID
        return $this->query("UPDATE products SET product_title='$prodTitle', product_cat='$prodCat', product_brand='$prodBrand', product_price='$prodPrice', product_desc='$prodDesc', product_image='$prodImage', product_keywords='$prodKeyW' WHERE product_id = '$prodId'");
    }

    // Function to update the details of a single category based on its ID
    function updateOneCategory($categId, $categName) {
        // Execute a SQL query to update the category name based on its ID
        return $this->query("UPDATE categories SET cat_name='$categName' WHERE cat_id = '$categId'");
    }

    // Function to update the details of a single brand based on its ID
    function updateOneBrand($brandId, $brandName) {
        // Execute a SQL query to update the brand name based on its ID
        return $this->query("UPDATE brands SET brand_name='$brandName' WHERE brand_id = '$brandId'");
    }

    //--DELETE--//

    // Function to delete a single product based on its ID
    function deleteOneProduct($prodId) {
        // Execute a SQL query to delete a product based on its ID
        return $this->query("DELETE FROM products WHERE product_id = '$prodId'");
    }

    // Function to delete a single category based on its ID
    function deleteOneCategory($categId) {
        // Execute a SQL query to delete a category based on its ID
        return $this->query("DELETE FROM categories WHERE cat_id = '$categId'");
    }

    // Function to delete a single brand based on its ID
    function deleteOneBrand($brandId) {
        // Execute a SQL query to delete a brand based on its ID
        return $this->query("DELETE FROM brands WHERE brand_id = '$brandId'");
    }
}

?>
