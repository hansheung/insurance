<?php
require_once '../connection.php';

$query = "SELECT user_policies.id AS user_policies_id,cert_num,total, start_date,status_id,users.name,users.DOB,policies.policy_name,premiums.sum_insured,premiums.tenure
from user_policies JOIN users ON user_policies.user_id = users.id JOIN policies ON user_policies.policy_id = policies.id JOIN premiums ON policies.premium_id = premiums.id;";
// echo "$query";
// die();

$results = mysqli_query($cn, $query);
$rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
// $result = $conn->query("SELECT * FROM users");
$data = [];

foreach($rows as $row){ 
    if($row['status_id'] == 1){
        $row['actions'] = '<button class="approve btn btn-primary" data-id="'. $row['user_policies_id'].'">Approve</button>
                       <button class="btn btn-danger reject" data-id="' . $row['user_policies_id'] . '">Reject</button>';
    }elseif($row['status_id'] == 2) {
        $row['actions'] = '<div><i>Approved</i></div>';
    }elseif($row['status_id'] == 3){
        $row['actions'] = '<div><i>Paid</i></div>';
    }elseif($row['status_id'] == 4){
        $row['actions'] = '<div><i>Rejected</i></div>';
    }
    $data[] = $row;
}

echo json_encode(['data' => $data]);




