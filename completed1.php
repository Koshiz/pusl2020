<?php
session_start();






if(!isset($_SESSION['seller'])){
header('Location: seller_login.php');
die();
}


$page="order completed submit";
include 'file_seller.php';

require 'connection.php';
$conn = Connect();


$checks = implode("','", $_POST['checkbox']);
$sql = "UPDATE orders SET `status` = 'done' WHERE order_ID in ('$checks')";
$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));

header('Location: view_order_details.php');
$conn->close();


?>