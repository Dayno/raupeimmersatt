<?php

$connection = mysqli_connect('localhost:3306','user','2496root','user');

// Checking for connections
if ($connection->connect_error) {
    die('Connect Error (' .
    $connection->connect_errno . ') '.
    $connection->connect_error);
}

?>