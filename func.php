<?php
    function tablequery($table){    
    require 'conn.php';
    $sql = "$table";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
    return $result;
    }
    
?>