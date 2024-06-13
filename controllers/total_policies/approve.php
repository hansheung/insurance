<?php
require_once '../connection.php';

if (isset($_POST['id'])) {
    $user_polcies_id = $_POST['id'];
 
    $status_id = 2; // Pending.

    $query = "UPDATE user_policies SET status_id= $status_id WHERE id = '$user_polcies_id';";

    mysqli_query($cn, $query);
    mysqli_close($cn);

    echo json_encode(['success' => true]);
}
