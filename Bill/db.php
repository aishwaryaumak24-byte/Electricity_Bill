<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "electricity_db";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

// Set character encoding
$conn->set_charset("utf8");

?>