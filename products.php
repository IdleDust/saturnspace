<?php
    include_once 'header.php';
    require_once 'include/connect_db.php';

    $sql = "select * from products";
    $results = $conn->query($sql);
    $movies = array();
    if ($results->num_rows > 0) {
        while($movie = $results->fetch_assoc()) {
            $m_id = $movie['p_id'];
            $movies[$m_id] = $movie;
        }
    }
//    print_r($movies);
?>

<section class="main-container">
    <div class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2>Check our new products </h2>
                    <p> Cras justo odio, dapibus ac facilisis in,
                        egestas eget quam. Fusce dapibus, tellus
                        ac cursus commodo, tortor mauris condimentum nibh,
                        ut fermentum massa justo sit amet.
                    </p>
                </div>
            </div>
            <div class="row">
            <div class="last5visitedproducts col-md-6">
                <h3>Five Last Previously Visited Products </h3>
                <?php
                if (isset($_COOKIE["lastids"])) {
                    if($lastids = explode(",", $_COOKIE["lastids"])) {
                        for ($i = 0; $i < 5 && $i < sizeof($lastids); $i++) {
                            $curProduct = $movies[$lastids[$i]];
                            $url = "viewproduct.php?id=" . $lastids[$i];
                            echo "<p><a href='$url'>" . $curProduct["p_id"] . " ".$curProduct["title"]."</a></p>";
                        }
                    }
                }
                ?>
            </div>

            <div class="top5visitedproducts col-md-6" >
                <h3>Five Most Visited Products</h3>
                <table class="table table-sm">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Hits</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_COOKIE["lastids"])) {
                            $hitCount = array();
                            if($allIds = explode(",", $_COOKIE["lastids"])) {
                                for ($i = 0; $i < sizeof($allIds); $i++) {
                                    $curId = $allIds[$i];
                                    if (isset($hitCount["$curId"])) {
                                        $hitCount["$curId"] = $hitCount["$curId"] + 1;
                                    }
                                    else $hitCount["$curId"] = 1;
                                    //echo "<li>" . $curId . " : " .$hitCount["$curId"]. "</li>";
                                }
                                arsort($hitCount);
                                $topFiveMostVisitedProducts = array_slice($hitCount,0,5,true);
                                foreach ($topFiveMostVisitedProducts as $key => $value) {
                                    $curProduct = $movies[$key];
                                    $url = "viewproduct.php?id=" . $key;
                                    echo "<tr><td><a href='$url'>" . $key . " ".$curProduct["title"]."</a></td>";
                                    echo "<td>". $value . "</td></tr>";
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            </div>


            <div class="row">
                <?php
                for ($i = 1; $i <= 10; $i++) {
                    echo "<div class='col-sm-6 col-md-3 col-lg-3'>";
                    echo "<a href='viewproduct.php?id=" . $i . "'>";
                    echo "<img src='img/product". $i. ".jpeg'" . " width='250' height='350'>
                    </a>";
                    $curProduct = $movies[$i];
                    echo "<p>" . $curProduct['title'] . "</p>" . "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</section>


<?php include_once 'footer.php'?>

