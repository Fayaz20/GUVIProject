<?php

$servername = "localhost";
$username = "root";
$password = "fayaz";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT name, email FROM users WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userData = array(
        'name' => $row['name'],
        'email' => $row['email']
    );
    echo json_encode($userData);
} else {
    echo json_encode(array("error" => "User not found"));
}

$conn->close();
?>
