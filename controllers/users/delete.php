<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $query = "DELETE FROM users WHERE id = '$id';";
    mysqli_query($cn, $query);
    mysqli_close($cn);
    // $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    // $stmt->bind_param("i", $id);
    // $stmt->execute();

    echo json_encode(['success' => true]);
}
?>