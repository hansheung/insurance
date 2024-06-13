<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    $id = $_POST['id'];

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

    if($password !=""){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "UPDATE users SET name='$name', email='$email', password='$password', DOB='$DOB',  tel='$tel', address='$address',  state='$state', country='$country',postal_code='$postal_code' WHERE id = '$id';";
    
    }else{
        $query = "UPDATE users SET name='$name', email='$email', DOB='$DOB', tel='$tel', address='$address', state='$state', country='$country',postal_code='$postal_code' WHERE id = '$id';";
    
    }
        
    mysqli_query($cn, $query);
    mysqli_close($cn);

    // $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    // $stmt->bind_param("ssi", $name, $email, $id);
    // $stmt->execute();

    echo json_encode(['success' => true]);
}
?>