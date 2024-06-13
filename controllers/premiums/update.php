<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $premium_name = $_POST['premium_name'];
    $sum_insured = $_POST['sum_insured'];
    $tenure = $_POST['tenure'];
    $premium = $_POST['premium'];
    
    $query = "UPDATE premiums SET premium_name='$premium_name', sum_insured='$sum_insured', tenure='$tenure', premium='$premium' WHERE id = '$id';";
        
    mysqli_query($cn, $query);
    mysqli_close($cn);
  
    echo json_encode(['success' => true]);
}
?>