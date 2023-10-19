<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="assets\css\main.css">
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-2c7831bb44f98c1391d6a4ffda0e1fd302503391ca806e7fcc7b9b87197aec26.js"></script>
</head>
<body>

    <div class="container">
      <div class="forms">
        <div class="form login">
          <span class="title">Login</span>
          <form action="#">
            <div class="input-field">
              <input type="text" placeholder="Enter your email" required>
              <i class="uil uil-envelope icon"></i>
            </div>
            <div class="input-field">
              <input type="password" class="password" placeholder="Enter your password" required>
              <i class="uil uil-lock icon"></i>
              <i class="uil uil-eye-slash showHidePw"></i>
            </div>
            <div class="checkbox-text">
              <div class="checkbox-content">
                <input type="checkbox" id="logCheck">
                <label for="logCheck" class="text">Remember me</label>
              </div>
              <a href="#" class="text">Forgot password?</a>
            </div>
            <div class="input-field button">
              <input type="button" value="Login Now"> </div>
          </form>
          <div class="login-signup">
          <span class="text">Not a member? <a href="register.php" class="text signup-link">Signup now</a></span>
          </div>
        </div>
      </div>
    </div>
    
      
</body>
</html>