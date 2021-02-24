<?php
$servername = "localhost";
$username = "root";
$database = "library";
$password  = "";
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
    echo mysqli_connect_error();
}
?>