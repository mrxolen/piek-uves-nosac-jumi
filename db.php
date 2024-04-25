<?php
$servername = "localhost"; // Replace with your database host if it's not on localhost
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$database = "sporta_laukumi"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>