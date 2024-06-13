<?php

require_once '../connection.php';
require_once '../../PHPmailer/script.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    
    $query = "SELECT * from users WHERE email = '$email';";
    $results = mysqli_query($cn, $query);
    if(mysqli_num_rows($results)==0){
        $subject = "Your email does no exists.";
        $message = "You have entered an invalid email account.";
    }else{
        $tempPassword = "ABC123";
        $password = password_hash("$tempPassword", PASSWORD_DEFAULT);
        $query = "UPDATE users SET password= '$password', forgot_password = 1 WHERE email = '$email';";
        mysqli_query($cn, $query);
        mysqli_close($cn);
        $subject = "Your password has been sent to you.";
        $message = "Your temporary password is <strong>" . $tempPassword . "</strong>. Please change your password after you have log in";
    }

    sendMail ($email, $subject, $message);

    header('Location: ../../index.php');

}