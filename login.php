<?php
$Username = $_POST['username'];
$Password = $_POST['password'];

//database connection
$conn = new mysqli('localhost','root','','ecommers');
if($conn->connect_error){
    die('connection failed : '.$conn->connect_error);
}
else{
    if(!empty($Username) && !empty($Password)){
    // Perform login logic here (e.g., check credentials against a database)
    // For demonstration purposes, we'll just display a success message
    

    $stmt = $conn->prepare("INSERT INTO login(username, password) VALUES(?,?)");
    $stmt->bind_param("ss", $Username, $Password);
    $stmt->execute();
    header("Location: select.html");
    exit();
    $stmt->close();
    $conn->close();
}

 else {
    echo "Please enter both username and password.";
}
}


?>