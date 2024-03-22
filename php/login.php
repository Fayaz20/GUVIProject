
<?php

require_once 'connection.php';
require_once '../vendor/autoload.php'; 

use Predis\Client;


$redis = new Client();

$email = $_POST['email'];
$password = $_POST['password'];


$sql = "SELECT id, name, email FROM users WHERE email=? AND password=?";
$stmt = $conn_mysql->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    $sessionKey = 'user:' . $user['id'];
    $redis->hmset($sessionKey, 'id', $user['id'], 'name', $user['name'], 'email', $user['email']);
    echo json_encode(array("success" => true, "userData" => $user));
} else {
    echo json_encode(array("success" => false, "message" => "Invalid email or password"));
}

$stmt->close();
$conn_mysql->close();
?>

