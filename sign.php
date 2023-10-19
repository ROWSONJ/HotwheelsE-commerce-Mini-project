<html lang="en"><head>
  <meta charset="UTF-8">
  


    
  
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>


  <title>CodePen - login &amp; regis unicons css</title>

    <link rel="canonical" href="https://codepen.io/aloofbxv-the-flexboxer/pen/YzBKyxX">
    <link rel="stylesheet" href="assets\css\main.css">
  
  
  


  

  
  
</head>

<body translate="no" data-new-gr-c-s-check-loaded="14.1043.0" data-gr-ext-installed="">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
<div class="container active">
 <div class="forms">
  <div class="form login">
   <span class="title">Login</span>
   <form action="#">
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
                    <i class="uil uil-eye showHidePw"></i>
                    
                </div>
    
    <div class="input-field button">
     <input type="button" value="Next" class="text signup-link"> </div>
   </form>

  </div>
  <!-- Registration Form -->
  <div class="form signup">
   <span class="title">Registration</span>
   <form action="#">
    <div class="input-field">
     <input type="text" placeholder="Enter your name" required="">
     <i class="uil uil-user"></i>
    </div>
    <div class="input-field">
     <input type="text" placeholder="Enter your email" required="">
     <i class="uil uil-envelope icon"></i>
    </div>
    <div class="input-field">
     <input type="text" class="password" placeholder="Create a password" required="">
     <i class="uil uil-lock icon"></i>
    </div>
    <div class="input-field">
     <input type="text" class="password" placeholder="Confirm a password" required="">
     <i class="uil uil-lock icon"></i>
     <i class="uil uil-eye showHidePw"></i>
    </div>
    <div class="checkbox-text">
     <div class="checkbox-content">
      <input type="checkbox" id="sigCheck">
      <label for="sigCheck" class="text">Remember me</label>
     </div>
     <a href="#" class="text">Forgot password?</a>
    </div>
    <div class="input-field button">
     <input type="button" value="Login Now"></div>
   </form>
   <div class="login-signup">
    <span class="text">Not a member?<a href="#" class="text login-link">Signup now</a></span>
   </div>
  </div>
 </div>
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
          icon.classList.replace("uil-eye", "uil-eye-slash");
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

  



</body><grammarly-desktop-integration data-grammarly-shadow-root="true"></grammarly-desktop-integration></html>