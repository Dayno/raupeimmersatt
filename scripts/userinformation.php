<?php
include 'databaseconnection.php';

# write data
mysqli_select_db($connection, "user");
$user = $_POST['user'];
$email = $_POST['email'];
$message = $_POST['message'];

$query = "INSERT INTO `userinfodata`(`user`,`email`,`message`) VALUES ('$user','$email','$message') ";

mysqli_query($connection, $query);


# reload
ob_start(); // ensures anything dumped out will be caught
$url = 'http://localhost';
// clear out the output buffer
while (ob_get_status()) {
    ob_end_clean();
}
// redirect
header("Location: $url");