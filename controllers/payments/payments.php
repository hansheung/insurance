<?php
require_once '../connection.php';

$query = "SELECT payments.id AS payments_id, which_policy, paid, users.name as user_name, DOB, policies.policy_name, user_policies.start_date, user_policies.cert_num, premiums.sum_insured FROM payments JOIN policies ON payments.which_policy = policies.id JOIN users on payments.user_id = users.id JOIN user_policies ON (payments.which_policy = user_policies.policy_id && payments.user_id = user_policies.user_id) JOIN premiums ON policies.premium_id = premiums.id;";
// echo "$query";
// die();

$results = mysqli_query($cn, $query);
$rows = mysqli_fetch_all($results, MYSQLI_ASSOC);
// $result = $conn->query("SELECT * FROM users");
$data = [];

foreach($rows as $row){ 
    $data[] = $row;
}

echo json_encode(['data' => $data]);

