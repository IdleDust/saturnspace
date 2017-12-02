<?php
    require_once 'connect_db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        echo "Post Set";
        if (isset($_POST['create'])) {
//            print_r($_POST);
            $firstName = trim($conn->escape_string($_POST['firstName']));
            $lastName = trim($conn->escape_string($_POST['lastName']));
            $address = trim($conn->escape_string($_POST['address']));
            $email = trim($conn->escape_string($_POST['email']));
            $cellPhone = trim($conn->escape_string($_POST['cellPhone']));
            $homePhone = trim($conn->escape_string($_POST['homePhone']));

            if ($firstName=="" || $lastName=="" || $address=="" || $email=="" || $cellPhone=="" || $homePhone==""){
                header("Location: ../user.php");
                exit();
            }
            $sql_validate = "SELECT email FROM user";
            $results = $conn->query($sql_validate);

            if ($results->num_rows >= 0) {
                $isDuplicate = false;
                while ($users = $results->fetch_assoc()){
                    foreach($users as $user) {
                        if (strtolower($user) == strtolower($email)) $isDuplicate = true;
                    }
                }
                if (!$isDuplicate) {
                    $querya = "INSERT INTO user (firstname, lastname, email, home_address, home_phone, cell_phone) VALUES "
                        . "('$firstName','$lastName','$email','$address','$homePhone','$cellPhone')";
                    if ($conn->query($querya)) {
                        echo "New User Created.";
                    } else {
                        echo "Error creating new user.";
                    }
                } else {
                    echo "Email Already Exists.";
                    echo '<br><a href="../user.php">Back To Users Page</a>';
                }
            }
        } else {
            echo 'Illegal Access.';
        }
    }

?>

