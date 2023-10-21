<?php
    require 'conn.php';
    function tablequery($conn,$table){   
    $sql = "$table";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
    return $result;
    }
    
?>