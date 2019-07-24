<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aromamenu";
header('Content-Type: text/html; charset=utf-8');


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
mysqli_set_charset($conn, 'utf8');
// echo "Connected successfully";
?>