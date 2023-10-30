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



                    echo '<script>
                        Swal.fire({
                            title: "Logout?",
                            text: "You want to logout?",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Yes"
                        }).then((result) => {
                            if (result.isConfirmed) {
                            Swal.fire(
                                "Logout!",
                                "Your has been logout.",
                                "success"
                            )
                            }
                        })
                    </script>';
                }else{
                    $_SESSION['error'] = 'Wrong password!';
                    header("location: ../views/login.php");
                }
            }
        }