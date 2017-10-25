
<?php
    include_once 'header.php';
?>

<div class="container">
    <form action="include/login.inc.php" method="POST">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputUsername4">username</label>
                <input type="username" name="username" class="form-control" id="inputUsername4" placeholder="username">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Password</label>
                <input type="password" name="pwd" class="form-control" id="inputPassword4" placeholder="Password">
            </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Log in</button>
    </form>
</div>

<?php include_once 'footer.php'?>