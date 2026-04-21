<?php
session_start();
require "db.php";
//var_dump($_POST);
if($_SERVER["REQUEST_METHOD"] == "POST")
    {
$Username = $_POST['username'];
$Password = $_POST['password'];



    if(!empty($Username) && !empty($Password)){
    // Perform login logic here (e.g., check credentials against a database)
    // For demonstration purposes, we'll just display a success message
    

    $stmt = $conn->prepare("select id,password from register where name=?");
    $stmt->bind_param("s", $Username);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows === 1)
        {
            $user = $result->fetch_assoc();
            //verify password
            /*echo "<pre>";
            var_dump($Username);
             echo "</pre>";
             die(); */
            if(password_verify($Password,$user['password']))
                {
                    $_SESSION['user_id'] = $user['id'];
                     header("Location: select.html");
                     exit();
                    }
                    else{
                        echo "Invalid password";
                    }
        }
        else{
            echo "User not found";
        }
}
else{
    echo "Please enter username and password";
}
    }


?>