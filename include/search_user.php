<?php
    require_once '../header.php';
    require_once 'connect_db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['search'])) {
        $keyword = $conn->escape_string($_POST['keyword']);
//        print_r("keyword[" . $keyword . "]<br>");

//        allow search by name, email, phone numbers.
        $sql_search = "SELECT * FROM user";
        $all_users = array();
        $results = $conn->query($sql_search);
        if ($results->num_rows > 0) {
            $i = 0;
            while ($user = $results->fetch_assoc()) {
                $all_users[$i] = $user;
                $i = $i + 1;
            }
        }

        $ans = array();
        $kw = trim(strtolower($keyword));
        foreach($all_users as $user) {
            $fn = trim(strtolower($user['firstname']));
            $ln = trim(strtolower($user['lastname']));
            $em = trim(strtolower($user['email']));
            $hp = trim(strtolower($user['home_phone']));
            $cp = trim(strtolower($user['cell_phone']));

            if ($fn==$kw || $ln==$kw || $em==$kw || $hp==$kw || $cp==$kw) {
                $ans[$user['email']] = $user;
            }
        }
        if (count($ans) > 0) {
            echo '<div class="col-lg-8 col-md-8 col-sm-12"><table class="table table-striped"><thead><tr>'.
                '<th scope="col">#</th>'.
                '<th scope="col">First Name</th>' .
                '<th scope="col">Last Name</th>'.
                '<th scope="col">Email</th>'.
                '<th scope="col">Address</th>'.
                '<th scope="col">Home Phone</th>'.
                '<th scope="col">Cell Phone</th>' .
                '</tr>'.'</thead>'.'<tbody>';
            $i = 1;
            foreach($ans as $user) {
                echo "<tr><th scope='row'>" . $i . "</th>";
                echo "<td>". $user['firstname']. "</td>";
                echo "<td>". $user['lastname']. "</td>";
                echo "<td>". $user['email']. "</td>";
                echo "<td>". $user['home_address']. "</td>";
                echo "<td>". $user['home_phone']. "</td>";
                echo "<td>". $user['cell_phone']. "</td>";
                echo "</tr>";
                $i = $i + 1;
            }
            echo '</tbody></table>.</div>';
        } else {
            echo "<p>No user found.</p>";
        }

    } else {
        echo "Invalid Access";
    }
}
?>