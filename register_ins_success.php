<?php


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css" />

</head>
<?php
include 'navbar.php';

?>
<?php

require 'connection.php';
$conn = Connect();

$fullname =($_POST['fullname']);
$username =($_POST['username']);
$email =($_POST['email']);
$contact =($_POST['contact']);
$address =($_POST['address']);
$password =($_POST['password']);

$query = "INSERT into customer(full_name,user_name,email,contact,address,password) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . $address ."','" . $password ."')";
$success = $conn->query($query);

if (!$success){
    die("Couldnt enter data: ".$conn->error);
}

$conn->close();

?>
<body>
<div class="container">

    <div class="my-5 p-5"></div>
    <div class="my-5 p-5 align-content-center">

    </div>

    <div class="my-5 p-5 d-flex justify-content-center">
        <div class="container">
            <div class="jumbotron">
                <h1 class="display-3">Welcome, <?php echo "Welcome $username!" ?></h1>
                <p class="lead mt-4">We have created your customer account</p>
                <hr class="my-4">

                <p class="lead">
                    <a class="btn btn-primary btn-lg" href="customer_login.php" role="button">log in </a>
                </p>
            </div>


        </div>




    </div>
</body>
</html>









