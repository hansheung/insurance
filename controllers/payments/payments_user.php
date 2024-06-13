<?php
require_once '../connection.php';

session_start();
$user_id = $_SESSION['user_info']['id'];

// echo $user_id;
// die();

// $user_id = 2;

$query = "SELECT payments.id AS payments_id, which_policy, paid, policies.policy_name, user_policies.start_date,user_policies.cert_num, premiums.sum_insured from payments JOIN policies ON payments.which_policy = policies.id JOIN user_policies ON (payments.which_policy = user_policies.policy_id && payments.user_id = user_policies.user_id) JOIN premiums ON policies.premium_id = premiums.id WHERE payments.user_id = '$user_id';";
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

