<?php
require_once '../connection.php';
// $conn = new mysqli('localhost', 'root', '', 'insurance');

if (isset($_POST['id'])) {
    session_start();
    $id = $_POST['id'];

    $name = $_POST['name'];
    $email = $_POST['email'];
    $DOB = $_POST['DOB'];
    $address = $_POST['add'];
    $tel = $_POST['tel'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $postal_code = $_POST['post'];

    //IMAGE HANDLING
    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $img_tmpname = $_FILES['image']['tmp_name']; 
    $img_type = strtolower(pathinfo($img_name, PATHINFO_EXTENSION)); //JPG -> jpg
    $img_path = "/public/".time()."-".$img_name; //32168731276310-file.jpg

    $extensions = ['jpg', 'jpeg', 'png', 'svg', 'gif', 'webp'];
    $is_img = false;
    // $has_details = false;

    if(in_array($img_type, $extensions)) {
        $is_img = true;
    } else {
        echo "Please upload an image";
    }

    if($is_img && $img_size > 0) {
        $query = "UPDATE users SET name='$name', email='$email', DOB='$DOB', address='$address', tel='$tel', state='$state', country='$country',postal_code='$postal_code',image='$img_path' WHERE id = '$id';";
        move_uploaded_file($img_tmpname, "../../dist/img".$img_path);
        mysqli_query($cn, $query);
        mysqli_close($cn);
        
        $_SESSION['message'] = "Update successful.";
        
        if (isset($_SESSION['user_info']) && $_SESSION['user_info']['isAdmin']) {
            header("Location: ../../views/pages/dashboard.php");
        } else {
            header("Location: ../../views/pages/dashboarduser.php");
        }
    }    
}
?>