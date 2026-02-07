<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "guvi_intern";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed");
}
// MongoDB Connection (for user profiles: age, dob, contact) - Safe initialization
$mongo_db = null;
if (file_exists(__DIR__ . '/../vendor/autoload.php')) {
    try {
        require_once __DIR__ . '/../vendor/autoload.php';
        
        $mongoUri = "mongodb://localhost:27017";
        $mongo_client = new \MongoDB\Client($mongoUri);
        $mongo_db = $mongo_client->user_auth_db;
    } catch (Exception $e) {
        // MongoDB not available, continue without it
        error_log("MongoDB connection error: " . $e->getMessage());
        $mongo_db = null;
    }
}


$redis = null;
if (extension_loaded('redis')) {
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
}
?>
