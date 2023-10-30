<script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

<?php
require_once '../global/conn.php';

if (isset($_POST['editprofile'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    if (isset($_FILES['imgfile']['name']) && !empty($_FILES['imgfile']['name'])) {
        $date1 = date("Ymd_His");
        $numrand = (mt_rand());
        $upload = $_FILES['imgfile']['name'];

        if ($upload != '') {
            $typefile = strrchr($_FILES['imgfile']['name'], ".");

            if ($typefile == '.jpg' || $typefile == '.jpeg' || $typefile == '.png') {
                $path = "../assets/images/upload/";
                $newname = $numrand . $date1 . $typefile;
                $path_copy = $path . $newname;
                move_uploaded_file($_FILES['imgfile']['tmp_name'], $path_copy);

                $conn = conndb();
                $user_id = $_SESSION['user_login'];

                $stmt = $conn->prepare("UPDATE users SET user_image=:newname WHERE user_id=:user_id");
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
                                window.location = "profile.php"; 
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
                                window.location = "profile.php"; 
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
                            window location = "profile.php"; 
                        });
                    }, 1000);
                    </script>';
            }
        }
    }


    $conn = conndb();
    $user_id = $_SESSION['user_login'];

    $stmt = $conn->prepare("UPDATE users SET username=:username, email=:email, first_name=:firstname, last_name=:lastname, date_of_birth=:dob, address=:address WHERE user_id=:user_id");
    $stmt->bindParam(":firstname", $firstname);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":dob", $dob);
    $stmt->bindParam(":address", $address);
    $stmt->bindParam(":user_id", $user_id);

    $result = $stmt->execute();

    if ($result) {
        echo '<script>
            setTimeout(function() {
                swal({
                    title: "Update Success",
                    type: "success"
                }, function() {
                    window.location = "profile.php"; 
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
                    window.location = "profile.php"; 
                });
            }, 1000);
        </script>';
    }
}
?>
