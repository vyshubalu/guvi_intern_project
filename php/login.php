<?php
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id,password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if($row = $result->fetch_assoc()){
    if(password_verify($password, $row['password'])){
        $token = bin2hex(random_bytes(32));
        $redis->set($token, $row['id']); // Disabled for now
        echo json_encode(["token"=>$token]);
        exit;
    }
}

echo json_encode(["error"=>"Invalid"]);
?>