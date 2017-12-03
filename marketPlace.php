
<?php

include_once 'header.php';

$url = "http://idledust.me/include/api.php";
$ch = curl_init($url);
// Disable SSL verification
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
// Will return the response, if false it print the response
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Set The Response Format to Json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
//curl_setopt($ch, )
$result=curl_exec($ch);
curl_close($ch);
// Will dump a beauty json :3
$users = json_decode($result, true);
foreach ($users as $user) {
     $firstname = $user['firstname'];
     $lastname = $user['lastname'];
     echo $firstname . " " . $lastname;
}

//TODO: show my own users table
//TODO: show 5 other companies' users table
//TODO: Table UI and

?>