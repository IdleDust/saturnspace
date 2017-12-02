<?php
$host = "localhost";
$username = "root";
$password = "123456";

// Create connection
$conn = new mysqli($host, $username, $password);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo '<script>console.log("Connected successfully")</script>';

$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
echo '<script>console.log("Database exists or created.\n")</script>';
} else {
echo "!Error creating database: " . $conn->error;
}


$sql = "USE myDB";
if ($conn->query($sql) === TRUE) {
echo '<script>console.log("Select Database successfully\n")</script>';
} else {
echo "!Error selecting database: " . $conn->error;
}
?>