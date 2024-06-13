<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $policy_name = $_POST['policy_name'];
    $premium_id = $_POST['premium_id'];
    $category_id = $_POST['category_id'];
    
    $query = "UPDATE policies SET policy_name='$policy_name', premium_id='$premium_id', category_id='$category_id' WHERE id = '$id';";
        
    mysqli_query($cn, $query);
    mysqli_close($cn);
  
    echo json_encode(['success' => true]);
}
?>