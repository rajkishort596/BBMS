<?php
$SITEURL = "http://localhost/BBMS/";
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bbms";
// $port = 4306; // Specify your custom port

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// echo "Connected successfully";
