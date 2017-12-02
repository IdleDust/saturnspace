<?php

    session_start();
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: ../user.php?logout=succeed");
        exit();
    } else {
        header("Location: ../index.php?logout=unauthorized");
        exit();
    }

?>