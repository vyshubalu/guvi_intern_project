<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "guvi_intern";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed");
}

$redis = null;
if (extension_loaded('redis')) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
}
?>