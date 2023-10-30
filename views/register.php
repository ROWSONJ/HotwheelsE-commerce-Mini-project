<?php
require '../global/conn.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
    
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="..\assets\css\main.css">
</head>
<body>
<div class="container ">
    <form action="register_db.php" method="post">
        <div class="forms" >
            <div class="form login"  >
            <span class="title">Registration</span>
                <?php if(isset($_SESSION['error'])){?>
                    <label>
                        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
                            <div class="alert error">
                                <span class="alertClose">X</span>
                                <span class="alertText">
                                    <?php
                                        echo $_SESSION['error'];
                                        unset($_SESSION['error']);
                                    ?>
                                    <br class="clear"/>
                                </span>
                            </div>
                    </label>   
                <?php }?>
                <?php if(isset($_SESSION['warning'])){?>
                    <label>
                        <input type="checkbox" class="alertCheckbox" autocomplete="off" />
                            <div class="alert warning">
                                <span class="alertClose">X</span>
                                <span class="alertText">
                                    <?php
                                        echo $_SESSION['warning'];
                                        unset($_SESSION['warning']);
                                    ?>
                                    <br class="clear"/>
                                </span>
                            </div>
                    </label>   
                <?php }?>
                
                    
                    <div class="input-field">
                        <input type="email" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" name="c_password" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                    </div>
                    <div class="input-field button">
                        <input type="button" value="Next" name="Next" class="text signup-link"> 
                    </div>
                    <div class="login-signup">
                            <span class="text">Already registered? <a href="../views/login.php" class="text signup-link">Login</a></span>
                    </div>
            </div>



            <div class="form signup" style="height:95%;">
            <span class="title">Registration</span>
                    <div class="input-field" style="margin-top:10px">
                        <input type="text" name="firstname" placeholder="Enter your first name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="lastname" placeholder="Enter your last name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="username" placeholder="Create your username" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="date" name="dob" placeholder="Enter your birthday" required>
                        <i class="uil uil-calender"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="address" placeholder="Enter your address" required>
                        <i class="uil uil-at"></i>
                    </div>   
                    <div class="input-field button" >
                        <input type="button" value="Previous" name="previous" class="text login-link" style="background-color: #9b9b9b;">
                        <input type="submit" value="Signup" id="signup" name="signup" style="margin-top: 60px;">
                    </div>
              
            </div>
        </div>
    </from>  
</div>
    
<script id="rendered-js">
const container = document.querySelector(".container"),
pwShowHide = document.querySelectorAll(".showHidePw"),
pwFields = document.querySelectorAll(".password"),
signUp = document.querySelector(".signup-link"),
login = document.querySelector(".login-link");

// js code to show/hide password and change icon
pwShowHide.forEach(eyeIcon => {
  eyeIcon.addEventListener("click", () => {
    pwFields.forEach(pwField => {
      if (pwField.type === "password") {
        pwField.type = "text";
        pwShowHide.forEach(icon => {
          icon.classList.replace("uil-eye-slash", "uil-eye");
          
        });
      } else {
        pwField.type = "password";
        pwShowHide.forEach(icon => {
            icon.classList.replace("uil-eye-slash", "uil-eye");
        });
      }
    });});});

// js code to appear signup and login form
signUp.addEventListener("click", () => {
  container.classList.add("active");
});
login.addEventListener("click", () => {
  container.classList.remove("active");
});

    </script>
</body>
</html>