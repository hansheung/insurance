<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_polcies_id = $_POST['id'];
    $status_id = 4; // Reject

    $query = "UPDATE user_policies SET status_id= $status_id WHERE id = '$user_polcies_id';";

    mysqli_query($cn, $query);
    mysqli_close($cn);

    echo json_encode(['success' => true]);
}
