<?php

$host = "sql101.epizy.com";
$user = "epiz_32378281";
$password = "jAS9d6jDvn2";
$db = "epiz_32378281_keykey";

$connection = new mysqli($host, $user, $password, $db);

if($connection === false){
    die("Connection Error: " . $connection->connnect_error);

}


?>