<?php


    require_once 'conn.php';
    
    if(isset($_POST['signup'])){
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];

        if(empty($firstname)){
            $_SESSION['error'] = 'Please enter your first name';
            header("location: register.php");
        }else if(empty($lastname)){
            $_SESSION['error'] = 'Please enter your last name';
            header("location: register.php");
        }else if(empty($username)){
            $_SESSION['error'] = 'Please enter your username';
            header("location: register.php");
        }else if(empty($email)){
            $_SESSION['error'] = 'Please enter your email';
            header("location: register.php");
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = 'Please enter a valid email address';
            header("location: register.php");
        }else if(empty($password)){
            $_SESSION['error'] = 'Please enter your password';
            header("location: register.php");
        }else if(strlen($_POST['password'])>20 || strlen($_POST['password']) <6 ){
            $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 6 ถึง 20 ตัวอักษร';
            header("location: register.php");
        }else if(empty($c_password)){
            $_SESSION['error'] = 'Please confirm your password';
            header("location: register.php");
        }else if($password != $c_password){
            $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
            header("location: register.php");
        }else if(empty($dob)){
            $_SESSION['error'] = 'Please enter your birthday';
            header("location: register.php");
        }else if(empty($address)){
            $_SESSION['error'] = 'Please enter your address';
            header("location: register.php");
        } else{
            try{
                $conn = conndb();
                $check_email = $conn->prepare("SELECT email FROM users WHERE email = :email");
                $check_email->bindParam(":email", $email);
                $check_email->execute();
                $row = $check_email->fetch(PDO::FETCH_ASSOC);

                if($row['email'] == $email){
                    $_SESSION['warning'] = 'Email already exist. <a href="login.php">login</a>';
                    header("location: register.php");
                }else if (!isset($_SESSION['error'])){
                    
                    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, username, email, password, date_of_birth, address) 
                                            VALUES (:firstname, :lastname, :username, :email, :password, :dob, :address) ");
                    $stmt->bindParam(":firstname", $firstname);
                    $stmt->bindParam(":lastname", $lastname);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":password", $passwordHash);
                    $stmt->bindParam(":dob", $dob);
                    $stmt->bindParam(":address", $address);
                    $stmt->execute();
                    $_SESSION['success'] = "Signup Success! <a href='login.php' >login</a>";
                    header("location: register.php");
                }else{
                    $_SESSION['error'] = "Something Wrong! <a href='login.php' >login</a>";
                    header("location: register.php");
                }

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        
    }
?>