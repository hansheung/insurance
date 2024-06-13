<?php 
require_once '../connection.php';
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password2 = $_POST['password2'];

$errors = 0;

// if(strlen($name) < 8) {
//     $errors++;
//     echo "<h4>Username must be atleast 8 characters</h4>";
// }

// if(strlen($password) < 8 || strlen($password2) < 8) {
//     $errors++;
//     echo "<h4>Password must be atleast 8 characters</h4>";
// }

if($password != $password2) {
    $errors++;
    echo "<script>";
    echo "alert(Password and Confirm Password should match.)";
    echo "</script>";
}

if($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>";
        echo "alert($email is not a valid email address.)";
        echo "</script>";
    }

    $query = "SELECT email FROM users WHERE email = '$email'";
    $result = mysqli_fetch_assoc(mysqli_query($cn, $query));

    if($result) {
        echo "<script>";
        echo "alert($email has already taken.)";
        echo "</script>";
        $errors++;
        mysqli_close($cn);
    }

}

if($errors > 0) {
    echo "<script>";
    echo "alert(Please fix the errors .)";
    echo "</script>";
}

if($errors === 0) {
    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (name, password, email) VALUES ('$name', '$password', '$email');";
    mysqli_query($cn, $query);
    mysqli_close($cn);
    
    session_start();
    echo '<script language="javascript">';
    echo 'alert("Registration successful")';
    echo '</script>';
    // die();
    header("Location: /");
}
