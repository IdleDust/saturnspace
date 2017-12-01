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

//  -- DROP user TABLE--
/*
$sql_drop_table = "DROP TABLE IF EXISTS user";
if ($conn->query($sql_drop_table) === TRUE) {
    echo '<script>console.log("user table dropped successfully\n")</script>';
} else {
    echo "Error dropping user table: " . $conn->error;
}
*/

// first name, last name, email, home address, home phone and cell phone.
$sql = "CREATE TABLE IF NOT EXISTS user(
    firstname VARCHAR (30) NOT NULL,
    lastname VARCHAR (30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    home_address VARCHAR (80) NOT NULL,
    home_phone VARCHAR (30) NOT NULL,
    cell_phone VARCHAR (30) NOT NULL,
    u_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY
)";
if ($conn->query($sql) === TRUE) {
    echo '<script>console.log("user table created successfully\n")</script>';
} else {
    echo "Error creating user table: " . $conn->error;
}

//$queries[0] = "INSERT INTO user(firstname,lastname, email,home_address, home_phone,cell_phone, u_id) VALUES ()";


$sql = "CREATE TABLE IF NOT EXISTS products(
    p_id INT(6) NOT NULL PRIMARY KEY,
    title VARCHAR (30),
    director VARCHAR (30),
    release_date DATE,
    description VARCHAR (255))";


if ($conn->query($sql) === TRUE) {
    echo '<script>console.log("products table created successfully\n")</script>';
} else {
    echo "Error creating products table: " . $conn->error;
}


?>
