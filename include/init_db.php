<?php
require_once 'connect_db.php';

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
    email VARCHAR(50) NOT NULL PRIMARY KEY,
    home_address VARCHAR (80) NOT NULL,
    home_phone VARCHAR (30) NOT NULL,
    cell_phone VARCHAR (30) NOT NULL
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
