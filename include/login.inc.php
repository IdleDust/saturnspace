<?php

    session_start();
    require_once 'init_db.php';

    if (isset($_POST['submit'])) {
        $u_name = trim($_POST['username']);
        $u_pwd = trim($_POST['pwd']);
        $user_id = NULL;


        /*
        $isfound = false;
        $sql = "SELECT u_id, username, password FROM user";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['username'] === $u_name and $row['password'] === $u_pwd) {
                    $isfound = true;
                    $user_id = $row['u_id'];
                    echo "user id: ";
                    echo $user_id;
                    break;
                }
            }
        */

        if ($u_name == "admin" AND $u_pwd == "password") {
                $_SESSION['u_id'] = 1;
                //to do: list all user here
                //

//                $sql = "SELECT username, email FROM user";
//                $result = $conn->query($sql);
//                if($result->num_rows > 0) {
//                    while ($row = $result->fetch_assoc()) {
//                        echo $row['username'] . "  " . $row[email];
//                    }
//                }
                header("Location: ../user.php?login=succeed");

            }
            else echo "user not found.";



    } else {
        header("Location: ../login.php?login=error");
        exit();
    }

?>


