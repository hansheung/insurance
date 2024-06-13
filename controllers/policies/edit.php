<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    
    // $query = "SELECT policies.id AS policy_id, policy_name, categories.category_name, premiums.premium_name, premiums.premium, premiums.    sum_insured, premiums.tenure      
    //         FROM policies
    //         JOIN categories on policies.category_id = categories.id
    //         JOIN premiums on policies.premium_id =premiums.id;
    //         where policy_id = '$id'
    //     ";

    $query = "SELECT * from policies where id = $id;";

    $results = mysqli_query($cn, $query);
    $row = mysqli_fetch_assoc($results);
    
     echo json_encode($row);  
}
?>