<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    $query = "SELECT * FROM premiums where id = '$id'";
    $results = mysqli_query($cn, $query);
    $row = mysqli_fetch_assoc($results);
    
     echo json_encode($row);  
}
?>