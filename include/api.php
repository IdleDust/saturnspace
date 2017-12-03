<?php

/**
 * Created by IntelliJ IDEA.
 * User: juanchen
 * Date: 12/2/17
 * Time: 11:00 PM
 */
require_once 'connect_db.php';

$all_users = array();
$sql_search = "SELECT * FROM user";
$results = $conn->query($sql_search);
if ($results->num_rows > 0) {
    $i = 0;
    while ($user = $results->fetch_assoc()) {
        $all_users[$i] = $user;
        $i = $i + 1;
    }
}
$data = json_encode($all_users);
echo $data;

