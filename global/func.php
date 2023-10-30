<?php
    include_once('../global/conn.php');

    function tablequery($table){   
    $conn = conndb();
    $sql = "$table";
    $result = $conn->query($sql);
    if(!$result){
        die("Error : ". $conn->$conn_error);
    }
    return $result;
    var_dump($result);
    }

    function checkLogin(){
        return isset($_SESSION['user_login']);
    }
    
?>