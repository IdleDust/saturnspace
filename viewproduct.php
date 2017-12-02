<?php
    include_once 'header.php';
    require_once 'include/connect_db.php';

    $sql = "select * from products";
    $results = $conn->query($sql);
    $products = array();
    if ($results->num_rows > 0) {
        while($movie = $results->fetch_assoc()) {
            $m_id = $movie['p_id'];
            $products[$m_id] = $movie;
        }
    }


    $url = $_SERVER['QUERY_STRING'];
    $array = explode('=', $url);
    $id = $array[1];
    $curProduct = $products[$id];
    $curProductTitle = $curProduct["title"];
    $curProductDescription = $curProduct["description"];
?>

<?php
    if (isset($_COOKIE["lastids"])) {
        setcookie("lastids", $id . "," . $_COOKIE["lastids"], time() + (86400 * 30));
    }
    else {
        setcookie("lastids", $id, time() + (86400 * 30));
    }
?>
    <section class="main-container">
        <div class="main-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-2 col-lg-3"></div>
                    <div class="col-md-8 col-lg-6 text-center">
                        <h4> <?php echo $curProductTitle; ?> </h4>
                        <div class="text-center">
                            <?php
                                echo "<img class='center-block' src='img/product". $id . ".jpeg' width='350' height='490'>";
                            ?>
                        </div>
                        <div class="row"> <?php echo $curProductDescription; ?> </div>
                    </div>
                </div>
                <div class="col-md-2 col-lg-3"></div>
            </div>
        </div>
    </section>

<?php include_once 'footer.php' ?>