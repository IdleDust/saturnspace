<?php
session_start();
include_once 'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <div class="container">
            <div class="row">
                <h4>All users</h4>
            </div>
            <div class="row">
                <?php
                if (!isset($_SESSION['u_id'])) {
                    echo "<div class='col-6'>" .
                        "<p>Log in as admin to list all users.<p>" .
                        "<p>Use 'admin/password' to log in.</p>";
                } else {
                    echo "<p>All users using our website:";
                    $fh = fopen('include/secure_contacts.txt','r');
                    while ($line = fgets($fh)) {
                        echo $line . "<br>" . PHP_EOL;
                    }
                    echo "</div>";
                    fclose($fh);
                }
                ?>
            </div>

        </div>
    </div>
</section>

<?php include_once 'footer.php'?>
