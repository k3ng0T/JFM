<?php
$servername = "MySQL-8.2";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, 'JFM-account');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>