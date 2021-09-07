<?php

session_start(); 

$conn = mysqli_connect('localhost','root','','emergency_button');
$userLotLat = $_POST;

$userId = $_SESSION["user_id"];

$latitude = $userLotLat['latitude'];
$longitude = $userLotLat['longitude'];

$sql = "insert into user_location(user_id,latitude,longitude) VALUES($userId,$latitude,$longitude)";
mysqli_query($conn,$sql);

?>