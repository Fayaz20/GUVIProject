<?php
$servername = "localhost";
$username = "root";
$password = "fayaz";
$dbname = "register";
$conn_mysql = new mysqli($servername, $username, $password, $dbname);
if ($conn_mysql->connect_error) {
    die("MySQL Connection failed: " . $conn_mysql->connect_error);
}
?>
