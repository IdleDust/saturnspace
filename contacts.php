<?php
    session_start();
    include_once 'header.php';
?>

<section class="main-container">
    <div class="main-wrapper">
        <div class="container">
            <div class="row">
                <h4>Contacts</h4>
            </div>
            <div class="row">
                <?php
                    $fh = fopen('include/contacts.txt','r');
                    while ($line = fgets($fh)) {
                        echo $line . "<br>" . PHP_EOL;
                    }
                    echo "</div>";
                    fclose($fh);
                ?>

            </div>

        </div>
    </div>
</section>

<?php include_once 'footer.php'?>

