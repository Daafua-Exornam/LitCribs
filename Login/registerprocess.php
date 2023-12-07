<?php

require('../Controllers/customer_controller.php');

// check for POST variable with the button
if (isset($_POST['addCustomer'])) {

    //Take the information inputted from form 
    $name = $_POST['fullname'];
    $email = $_POST['email'];

    //Mask the password and save as a new variable
    $pwordInput = $_POST['confirm'];
    $userPword = password_hash($pwordInput, PASSWORD_DEFAULT);

    $country = $_POST['country'];
    $city = $_POST['city'];
    $contact = $_POST['contact'];
    $image = $_POST['image'];
    $role = $_POST['role'];

    // call customer class controller 
    $results = addCustomerController($name, $email, $userPword, $country, $city, $contact, $image, $role);
    //$results = test($name);

    //Checking the controller function
    print $results ? header ("Location: login.php") : "insertion failed"; 

}
