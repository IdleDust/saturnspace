<?php
$servername = "localhost";
$username = "root";
$password = "123456";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo '<script>console.log("Database Connected successfully\n")</script>';


$sql = "CREATE DATABASE IF NOT EXISTS myDB";
if ($conn->query($sql) === TRUE) {
    echo '<script>console.log("Database created successfully\n")</script>';
} else {
    echo "Error creating database: " . $conn->error;
}


$sql = "USE myDB";
if ($conn->query($sql) === TRUE) {
    echo '<script>console.log("Select Database successfully\n")</script>';
} else {
    echo "Error selecting database: " . $conn->error;
}

$sql_drop_table = "DROP TABLE user";
if ($conn->query($sql_drop_table) === TRUE) {
    echo '<script>console.log("user table dropped successfully\n")</script>';
} else {
    echo "Error dropping user table: " . $conn->error;
}

// first name, last name, email, home address, home phone and cell phone.
$sql = "CREATE TABLE IF NOT EXISTS user(
    u_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    firstname VARCHAR (30) NOT NULL,
    lastname VARCHAR (30) NOT NULL,
    email VARCHAR(50),
    home_address VARCHAR (80),
    home_phone VARCHAR (30),
    cell_phone VARCHAR (30),
    reg_date TIMESTAMP)";
if ($conn->query($sql) === TRUE) {
    echo '<script>console.log("user table created successfully\n")</script>';
} else {
    echo "Error creating user table: " . $conn->error;
}

$drop_table_products = "DROP TABLE products";
if ($conn->query($drop_table_products) === TRUE) {
    echo '<script>console.log("products table dropped successfully\n")</script>';
} else {
    echo "Error dropping products table: " . $conn->error;
}

    $sql = "CREATE TABLE IF NOT EXISTS products(
    u_id INT(6) NOT NULL PRIMARY KEY,
    title VARCHAR (30),
    price NUMBER (10),
    director VARCHAR (30),
    release_date DATE,
    image TEXT, 
    description TEXT)";

if ($conn->query($sql) === TRUE) {
    echo '<script>console.log("products table created successfully\n")</script>';
} else {
    echo "Error creating products table: " . $conn->error;
}

//$sql = "INSERT INTO product (u_id, productname, title, price, description)
//VALUES ('1', 'Earth', 'Third planet from the Sun', NULL, 'Earth is the third planet from the Sun and the only object in the Universe known to harbor life. According to radiometric dating and other sources of evidence, Earth formed over 4 billion years ago.')";
//
//if ($conn->query($sql) === TRUE) {
//    echo "New record created successfully";
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}

/*
$sql = "INSERT INTO user (username, password, email)
VALUES ('David', '1234', 'david@gmail.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$sql = "INSERT INTO user (username, password, email)
VALUES ('Liu', '1234', 'liu@gmail.com')";
$sql = "INSERT INTO user (username, password, email)
VALUES ('Joene', '1234', 'joene@gmail.com')";
$sql = "INSERT INTO user (username, password, email)
VALUES ('user1', '1234', 'user1@gmail.com')";



$sql = "INSERT INTO user (username, password, email)
VALUES ('admin', 'password', 'admin@saturnspace.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


// retrieve data from table myGuests
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
    }
} else {
    echo "0 results";
}




// insert data into table myGuests
$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('John', 'Doe', 'john@example.com')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$sql = "INSERT INTO MyGuests (firstname, lastname, email)
VALUES ('Joane', 'lu', 'joane.lu@example.com')";

if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
*/

?>

