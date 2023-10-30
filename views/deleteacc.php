<?php
    require_once '../global/conn.php';
    if(isset($_SESSION['user_login'])){
        $conn = conndb();
        $user_id = $_SESSION['user_login'];
        $stmt = $conn->query("SELECT * from users WHERE user_id = '$user_id'");
        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);



            if($user_id  == $row['user_id']){
                if(password_verify($password, $row['password'])){

                    $stmt = $conn->prepare("DELETE FROM users WHERE :user_id ");
                    $stmt = bindParam(":user_id", $user_id);



                    $_SESSION['user_delete'] = $row['user_id'];
                    header("location: ../views/login.php");
                }else{
                    $_SESSION['error'] = 'Wrong password!';
                    header("location: ../views/login.php");
                }
            }