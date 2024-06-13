<?php
require_once '../connection.php';

$query = "SELECT policies.id AS policy_id, policy_name, categories.category_name, premiums.premium_name, premiums.premium, premiums.    sum_insured, premiums.tenure      
            FROM policies
            JOIN categories on policies.category_id = categories.id
            JOIN premiums on policies.premium_id =premiums.id;
        ";
// echo "$query";
// die();

$results = mysqli_query($cn, $query);
$rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
// $result = $conn->query("SELECT * FROM users");
$data = [];

foreach($rows as $row){
    $row['actions'] = '<button class="edit btn btn-success" data-id="'. $row['policy_id'].'">Edit</button>
                       <button class="btn btn-danger delete" data-id="' . $row['policy_id'] . '" data-policy_name="' . htmlspecialchars($row['policy_name'], ENT_QUOTES, 'UTF-8') . '">Delete</button>';

    $data[] = $row;
}

// while ($row = mysqli_fetch_assoc($results)) {
//     $row['actions'] = '<button class="edit btn btn-success" data-bs-toggle="modal" data-bs-target="#edit" data-id="'.$row['id'].'">Edit</button>
//                        <button class="delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete" data-id="'.$row['id'].'">Delete</button>';
//     $data[] = $row;

//     var_dump(mysqli_fetch_assoc($results));
// }

echo json_encode(['data' => $data]);
?>



