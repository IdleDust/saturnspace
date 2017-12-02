<?php
    session_start();
    include_once 'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <div class="container text-center">
<!--            Search Start Here-->
            <div class="row" style="color: grey">Try search '4082690500', 'Gina', 'Alice','JonnyCampbell@gmail.com'</div>
            <div class="text-center">
                <form class="form-horizontal input_mask" action="include/search_user.php" method="post">
                    <div class="form-row">
                        <div class="col col-lg-8 col-md-8 col-sm-12">
                            <input type="text" class="form-control" name="keyword" placeholder="keyword">
                        </div>
                        <div class="col col-lg-1 col-md-1 col-sm-12">
                            <button name="search" type="submit" class="btn btn-primary">Search</button>
                        </div>
                        <div class="col-lg-3 col-md-3"></div>
                    </div>
                </form>
            </div>
<!--            SEARCH END HERE-->

<!--            FROM START HERE-->
            <br><br>
            <div class="row">
            <div class="col-md-6">
                <form class="form-horizontal form-label-left input_mask" action="include/add_user.php" method="post">
                    <div class="col">Create New User Form: </div><br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="firstName" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="lastName" placeholder="Last name">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" class="form-control" name="homePhone" placeholder="Home Phone">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" name="cellPhone" placeholder="Cell Phone">
                        </div>
                    </div>
                    <div class="form-row center-block"">
                        <div class="col">
                            <input type="text" class="form-control" name="address"  placeholder="Home Address">
                        </div>
            </div><br>
                    <button name="create" type="submit" class="btn btn-primary center-block">Create</button>

                </form>
            </div>
            </div>
<!--            FORM END HERE-->

            <br><br><br>
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
