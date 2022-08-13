<?php

require_once('config.php');

$username = $connection->real_escape_string ($_POST['username']);
$class = $connection->real_escape_string ($_POST['class']);
$section = $connection->real_escape_string ($_POST['section']);


$sql = "INSERT INTO register (username, class, section) VALUES ('$username', '$class', '$section')";
if ($connection->query($sql) === true){
    echo "Successful registration";
}else{
    echo "Error during registration $sql. " . $connection->error;
}


?>