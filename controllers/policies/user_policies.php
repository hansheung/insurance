<?php
require_once '../connection.php';

$query = "SELECT policies.id AS policy_id, policy_name, categories.category_name, premiums.premium_name, premiums.premium, premiums.sum_insured, premiums.tenure      
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
    $row['actions'] = '<button class="btn btn-success apply" 
                        data-policy_id="' . $row['policy_id'] . '" 
                        data-policy_name="' . htmlspecialchars($row['policy_name'], ENT_QUOTES, 'UTF-8') . '"
                        data-premium="' . $row['premium'] . '"
                        >Apply</button>';

    $data[] = $row;
}

echo json_encode(['data' => $data]);
?>



