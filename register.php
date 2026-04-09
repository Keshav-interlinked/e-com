<?php
$name = $_POST['name'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$phno = $_POST['phno'];
$email = $_POST['email'];
$password = $_POST['password'];

//database connection
$conn = new mysqli('localhost','root','','ecommers');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
else{
    $stmt = $conn->prepare("INSERT INTO register(name, dob, address, phno, email, password) VALUES(?,?,?,?,?,?)");
    $stmt->bind_param("ssssss", $name, $dob, $address, $phno, $email, $password);
    $stmt->execute();
     header("Location: select.html");
    exit();
    $stmt->close();
    $conn->close();
}





?>