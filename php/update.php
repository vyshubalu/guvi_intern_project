<?php
include 'db.php';

$token = $_POST['token'];
$user_id = $redis->get($token); // Disabled for now
$user_id = 1; // Hardcoded for testing

if(!$user_id){
    echo "Unauthorized";
    exit;
}

$age = $_POST['age'];
$dob = $_POST['dob'];
$contact = $_POST['contact'];

$stmt = $conn->prepare("UPDATE users SET age=?, dob=?, contact=? WHERE id=?");
$stmt->bind_param("issi", $age, $dob, $contact, $user_id);

if($stmt->execute()){
    echo "Profile Updated";
}else{
    echo "Error";
}
?>