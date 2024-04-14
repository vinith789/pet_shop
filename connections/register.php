<?php
require("db_connect.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_REQUEST['email'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $confirmpassword = $_REQUEST['confirmpassword'];


    $query = "INSERT INTO users (email, username, password, confirmpassword, created , modified) VALUES ('$email', '$username', '$password', '$confirmpassword', NOW(), NOW())";

    if( $password != $confirmpassword ){
        echo "password and confirmpassword is incorrect";
        return false;
    }


    $sql = 'SELECT email FROM users WHERE email=:email';
    if ($sql === $email){
        echo "email already exists";
        return false;
    }
    
    if (mysqli_query($conn, $query)) {
    
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    header("Location: ../users/login.php");
}
?>