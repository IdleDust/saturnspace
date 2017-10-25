<?php

    session_start();
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header("Location: ../contacts.php?logout=succeed");
        exit();
    } else {
        header("Location: ../contacts.php?logout=unauthorized");
        exit();
    }

?>