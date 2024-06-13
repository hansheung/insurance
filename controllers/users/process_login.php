<?php 
require_once '../connection.php';
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email'";
// $result = mysqli_query($cn, $query)
$user = mysqli_fetch_assoc(mysqli_query($cn, $query));

if($user['forgot_password'] == 1){
    session_start();
    $_SESSION['user_info'] = $user;
    header('Location: ../../change-password.php');
    die();
}

if ($user === null) {
    echo "<h4>Wrong Credentials</h4>";
    echo "<a href='../../index.php'>Go back to login</a>";
    die();
}

if($email && password_verify($password, $user['password'])) {
    session_start();
    $_SESSION['user_info'] = $user;
    mysqli_close($cn);
    if($user['isAdmin']){
        header('Location: /views/pages/dashboard.php');
    }else{
        header('Location: /views/pages/dashboarduser.php');
    }
} else {
    echo "<h4>Wrong Credentials</h4>";
    echo "<a href='../../index.php'>Go back to login</a>";
}