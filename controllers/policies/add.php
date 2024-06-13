<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $policy_name = $_POST['policy_name'];
    $premium_id = $_POST['premium_id'];
    $category_id = $_POST['category_id'];
    
    $query = "INSERT INTO policies (policy_name, premium_id, category_id) VALUES ('$policy_name', '$premium_id', '$category_id');";
    mysqli_query($cn, $query);
    mysqli_close($cn);

    echo json_encode(['success' => true]);
}
?>
