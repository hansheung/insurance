<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $policy_id = $_POST['policy_id'];
    $start_date = $_POST['start_date'];
    $total = $_POST['premium'];
    $cert_num = time();
    $status_id = 1; // Pending.

    $query = "INSERT INTO user_policies (user_id, policy_id, start_date, total, cert_num, status_id) VALUES ('$user_id', '$policy_id', '$start_date', '$total', '$cert_num', $status_id);";
    
    mysqli_query($cn, $query);
    mysqli_close($cn);

    echo json_encode(['success' => true]);
}
?>
