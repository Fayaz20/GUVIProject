<?php

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$sessionId = $_COOKIE['PHPSESSID'];

$redis->del('session:' . $sessionId);

setcookie('PHPSESSID', '', time() - 3600, '/');

header("Location: index.html");
exit();
?>
