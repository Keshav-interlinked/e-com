<?php
require "db.php";
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phno = $_POST['phno'];
$email = $_POST['email'];
$Password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO register(name, dob, address, phno, email, password) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $dob, $address, $phno, $email, $Password);
    $stmt->execute();
     header("Location: select.html");
    exit();
    $stmt->close();
    $conn->close();






?>