<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "user_internhub";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>