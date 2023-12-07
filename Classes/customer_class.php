<?php
// Include the appropriate database connection file (e.g., db_class.php or db_connection.php)
include("../Settings/db_class.php");

class Customer extends DbConnection {

    //--INSERT--//
    
    // Add a new customer to the database.
    function addCustomerCls($name, $email, $userPword, $country, $city, $contact, $image, $role) {
        $sql = "INSERT INTO customer(customer_name, customer_email, customer_pass, customer_country, customer_city, 
        customer_contact, customer_image, user_role) values ('$name', '$email', '$userPword', '$country', '$city', '$contact', '$image', '$role')";

        return $this->query($sql);
    }

    //--SELECT--//
    
    // Retrieve customer information based on their email.
    function cutomerLoginCls($email) {
        $sql = "SELECT * FROM customer where customer_email = '$email'";
        return $this->fetchOne($sql);
    }

    //--UPDATE--//
    
    // Update customer details in the database.
    function editCustomerCls($name, $email, $userPword, $country, $city, $contact, $image, $role) {
        $sql = "UPDATE customer SET customer_name = '$name', customer_email = '$email', customer_pass = '$userPword', customer_country = '$country', customer_city = '$city', 
        customer_contact = '$contact', customer_image = '$image', user_role = '$role' WHERE '1'";

        return $this->query($sql);
    }

    //--DELETE--//
    
    // Delete a customer from the database based on their name, email, and password.
    function delCustomer($name, $email, $userPword) {
        $sql = "DELETE FROM customer WHERE customer_name = '$name' AND customer_email = '$email' AND customer_pass = '$userPword'";
        return $this->query($sql);
    }
}
