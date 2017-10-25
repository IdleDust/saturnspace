<?php

    session_start();
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: ../users.php?logout=succeed");
        exit();
    } else {
        header("Location: ../index.php?logout=unauthorized");
        exit();
    }

?>