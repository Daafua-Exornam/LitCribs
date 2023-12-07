<?php

//database credentials
require('db_cred.php');
     
// Include a separate file 'db_cred.php' to retrieve database credentials.

class DbConnection
{
    public $results = null; // Variable to store query results.
    public $database = null; // Database connection variable.

    // Function to establish a database connection.
    public function connect()
    {
        // Attempt to connect to the database using the defined credentials.
        $this->database = mysqli_connect(SERVER, USERNAME, PASSWORD, DATABASE);

        // Check if the connection was successful and set a message accordingly.
        $connect = mysqli_connect_errno() ? 'Connection Successful' : 'Connection failed.';

        return $connect; // Return the connection status message.
    }

    // Function to execute a database query.
    function query($query)
    {
        if ($this->connect() != true) {
            return false; // If the connection is not successful, return false.
        }

        $this->results = mysqli_query($this->database, $query); // Execute the query.

        if ($this->results == false) {
            return false; // If the query execution fails, return false.
        }

        return true; // Return true if the query is executed successfully.
    }

    // Function to execute a database query that escapes special characters.
    function dbQueryEscapeString($query)
    {
        $this->results = mysqli_query($this->database, $query);

        if ($this->results == false) {
            return false; // If the query execution fails, return false.
        }

        return true; // Return true if the query is executed successfully.
    }

    // Function to fetch all rows from a query result as an associative array.
    function fetch($query)
    {
        if ($this->query($query)) {
            return mysqli_fetch_all($this->results, MYSQLI_ASSOC); // Return query results as an associative array.
        }

        return false; // Return false if the query execution fails.
    }

    // Function to fetch one row from a query result as an associative array.
    function fetchOne($query)
    {
        if ($this->query($query)) {
            return mysqli_fetch_assoc($this->results); // Return one row as an associative array.
        }

        return false; // Return false if the query execution fails.
    }

    // Function to count the number of rows in the result set.
    function count()
    {
        if ($this->results == null || $this->results == false) {
            return false; // Return false if there are no results or if the results are invalid.
        }

        return mysqli_num_rows($this->results); // Return the number of rows in the result set.
    }
}

?>    