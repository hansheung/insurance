<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category_name = $_POST['category_name'];
 
    $query = "INSERT INTO categories (category_name) VALUES ('$category_name');";
    mysqli_query($cn, $query);
    mysqli_close($cn);

    echo json_encode(['success' => true]);
}
?>
