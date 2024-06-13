<?php 

// mysqli('hostname', 'dbUsername', 'dbPassword', 'dbName');
$cn = mysqli_connect("localhost", "root", "", "insurance");

//Check connection
if(mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: ". mysqli_connect_error();
    die();
};