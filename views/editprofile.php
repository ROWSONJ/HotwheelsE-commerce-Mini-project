<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
require_once 'conn.php';

if (isset($_POST['editprofile'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    if(isset($_FILES['imgfile']['name']) AND !empty($_FILES['imgfile']['name'])) {
        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $img_file = (isset($_POST['imgfile']) ? $_POST['imgfile'] : '');
        $upload = $_FILES['imgfile']['name'];

        if ($upload != '') {
            $typefile = strrchr($_FILES['imgfile']['name'], ".");

            if ($typefile == '.jpg' || $typefile == '.jpeg' || $typefile == '.png') {
                $path = "upload/";
                $newname = $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;
                move_uploaded_file($_FILES['imgfile']['tmp_name'], $path_copy);

                    $conn = conndb();
                    $user_id = $_SESSION['user_login'];

            
                    $stmt = $conn->prepare("UPDATE `users` SET username=:username_up, email=:email_up, first_name=:firstname_up, last_name=:lastname_up, date_of_birth=:dob_up, address=:address_up, user_image=:newname WHERE user_id=:user_id");
                    $stmt->bindParam(":firstname_up", $firstname);
                    $stmt->bindParam(":lastname_up", $lastname);
                    $stmt->bindParam(":username_up", $username);
                    $stmt->bindParam(":email_up", $email);
                    $stmt->bindParam(":dob_up", $dob);
                    $stmt->bindParam(":address_up", $address);
                    $stmt->bindParam(":newname", $newname);  
                    $stmt->bindParam(":user_id", $user_id);


                    $result = $stmt->execute();

                        if ($result) {
                            echo '<script>
                                setTimeout(function() {
                                swal({
                                    title: "Update Success",
                                    type: "success"
                                }, function() {
                                    window.location = "profile.php"; //หน้าที่ต้องการให้กระโดดไป
                                });
                                }, 1000);
                            </script>';
                        } else {
                            echo '<script>
                                setTimeout(function() {
                                swal({
                                    title: "Error!",
                                    type: "error"
                                }, function() {
                                    window.location = "profile.php"; //หน้าที่ต้องการให้กระโดดไป
                                });
                                }, 1000);
                            </script>';
                        }

            } else {
                echo '<script>
                    setTimeout(function() {
                    swal({
                        title: "File not correct",
                        type: "error"
                    }, function() {
                        window.location = "profile.php"; //หน้าที่ต้องการให้กระโดดไป
                    });
                    }, 1000);
                    </script>';
            }
                
        }
    }
}
        

?>
