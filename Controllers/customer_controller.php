<?php

// Include the customer class file to access the functions within
include('../Classes/customer_class.php');

// Function to add a new customer to the database
function addCustomerController($name, $email, $userPword, $country, $city, $contact, $image, $role)
{
    // Create a new instance of the Customer class
    $customerInstance = new Customer();

    // Call the 'addCustomerCls' method of the Customer class to insert a new customer
    return $customerInstance->addCustomerCls($name, $email, $userPword, $country, $city, $contact, $image, $role);
}

// Function to retrieve customer information based on their email
function getLoginController($email)
{
    // Create a new instance of the Customer class
    $loginInstance = new Customer();

    // Call the 'cutomerLoginCls' method of the Customer class to retrieve customer information
    return $loginInstance->cutomerLoginCls($email);
}
?>