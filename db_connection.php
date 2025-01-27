<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "crud_project";

// Create connection
$connection = new mysqli($servername, $username, $password, $database);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: ' . $connection->connect_error");
}

?>