<?php
include 'config.php'; 
session_start();

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = $_POST['password'];

    // check if email exists
    $sql = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);

        // verify password
        if(password_verify($pass, $user['password'])){
            
            // store user name in session
            $_SESSION['username'] = $user['name'];

            echo "<script>alert('Login Successful!'); window.location.href='index.php';</script>";
        
        } else {
            echo "<script>alert('Incorrect Password'); window.location.href='login.html';</script>";
        }

    } else {
        echo "<script>alert('Email not found'); window.location.href='login.html';</script>";
    }

}
?>
