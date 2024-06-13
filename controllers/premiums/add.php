<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $premium_name = $_POST['premium_name'];
    $premium = $_POST['premium'];
    $sum_insured = $_POST['sum_insured'];
    $tenure = $_POST['tenure'];
    
    $query = "INSERT INTO premiums (premium_name, sum_insured, tenure, premium) VALUES ('$premium_name', '$sum_insured', '$tenure', '$premium');";
    mysqli_query($cn, $query);
    mysqli_close($cn);

    echo json_encode(['success' => true]);
}
?>
