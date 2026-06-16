<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "db_book_hub";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// echo "Connected successfully";
