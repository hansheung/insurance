<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $category_name = $_POST['category_name'];
    
    $query = "UPDATE categories SET category_name='$category_name' WHERE id = '$id';";
        
    mysqli_query($cn, $query);
    mysqli_close($cn);

    
    echo json_encode(['success' => true]);
}
?>