<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $query = "SELECT * FROM users where id = '$id'";
    $results = mysqli_query($cn, $query);
    $row = mysqli_fetch_assoc($results);
    
     echo json_encode($row);

    // $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    // $stmt->bind_param("i", $id);
    // $stmt->execute();
    // $result = $stmt->get_result();
    // // var_dump($result);
    // echo "<br>=============";
    
    
    // echo json_encode($result->fetch_assoc());

    // echo "<br>------------";
    
}
?>