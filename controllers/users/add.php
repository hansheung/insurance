<?php
require_once '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $DOB = $_POST['DOB'];
    $tel = $_POST['tel'];
    $address = $_POST['add'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $postal_code = $_POST['post'];
    $isAdmin = $_POST['isAdmin'];

    $password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (name, email, password, DOB, tel, address, state, country, postal_code, isAdmin) VALUES ('$name', '$email', '$password', '$DOB', '$tel', '$address','$state', '$country','$postal_code', '$isAdmin');";
    mysqli_query($cn, $query);
    mysqli_close($cn);

    // $stmt = $conn->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    // $stmt->bind_param("ss", $name, $email);
    // $stmt->execute();

    echo json_encode(['success' => true]);
}
?>
