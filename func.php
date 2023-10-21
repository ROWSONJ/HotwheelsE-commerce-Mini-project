<?php
    include_once('conn.php');

    function tablequery($table){   
    $conn = conndb();
    $sql = "$table";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
    return $result;
    }
    
?>