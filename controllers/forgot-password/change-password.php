<?php

require_once '../connection.php';

// require_once '../../PHPmailer/script.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    
    echo "Is it here 2";
// die();

    

    $query = "SELECT * from users WHERE email = '$email';";
    $results = mysqli_query($cn, $query);
    $row = mysqli_fetch_assoc($results);
    $hashedPassword = $row['password'];
    
    // echo $email;
    // echo $currentPassword;
    // echo $hashedPassword;
    // die();


    $password = PASSWORD_HASH($newPassword, PASSWORD_DEFAULT);
    if (password_verify($currentPassword, $hashedPassword)) {
    
        $query = "UPDATE users SET password= '$password', forgot_password = 0 WHERE email = '$email';";
        mysqli_query($cn, $query);
        mysqli_close($cn);
        header("Location: ../../index.php");
    }else{
    //     echo $email;
    // // echo $currentPassword;
    // echo $newPassword;
    // die();
        session_start();
        $_SESSION['message'] = "Current Password is not correct";
        header("Location: ../../change-password.php");
    }
   
}