<?php
$servername = "localhost";
$usernamec = "root";
$password = "";
$dbname = "onlinehostel";

// Create connection
$conn = new mysqli($servername, $usernamec, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>
