<?php

require_once '../connection.php';
require_once '../../PHPmailer/script.php';
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_info']['id'];
    $email = $_SESSION['user_info']['email'];
    $cert_num = $_POST['cert_num'];
    $policy_id = $_POST['policy_id'];
    $premium = $_POST['premium'];
    $status_id = 3; // Paid.

    $query = "INSERT INTO payments (which_policy, paid, user_id) VALUES ('$policy_id', '$premium', '$user_id');";
    mysqli_query($cn, $query);
    // mysqli_close($cn);

    $query = "UPDATE user_policies SET status_id=$status_id WHERE policy_id = '$policy_id';";
    mysqli_query($cn, $query);
    mysqli_close($cn);

    $email = "hansheung@gmail.com";
    $subject = "Payment successful";
    $message = "You have paid for the amount $" . $premium . " for the Certificate no: " . $cert_num . ". ";

    sendMail ($email, $subject, $message);

    header('Location: ../../views/pages/dashboarduser.php');
    

}