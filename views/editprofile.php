<?php 
    require '../global/header.php'; 
    require '../global/menubar.php';

    require 'conn.php';
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
?>

hello