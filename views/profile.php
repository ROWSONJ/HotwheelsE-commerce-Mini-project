<?php 
    require '../global/conn.php';
    require '../global/header.php'; 
    require '../global/menubar.php';

    if(!isset($_SESSION['user_login'])){
      //อย่าลืมทำalertให้เข้าสู่ระบบ
      header('location: login.php');
    }
    
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
      

      <style>
      html {
        font-family: var(--ff-josefin-sans);
        font-size: 10px;
        scroll-behavior: smooth;
      }

      body {
        background: var(--white);
        font-size: 1.6rem;
        padding-block-start: 90px;
        background: rgba(0,0,0,0.05);
      } 

      
      .profile{
        position: fixed;
        z-index:3;
        translate: -50% -50%;
        width:25%;
        padding: 70px 30px 44px;
        border-radius: 1.25rem;
        background: #fff;
        text-align: center;
        margin-top: 200px;
        margin-left: 200px;

      }

      .profile img {
        width: 120px;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 50%;
        margin: 0 auto; /* Center the image horizontally */
        display: block; /* Ensure block-level rendering to center horizontally */
        margin-bottom: 20px;
      }

      .pic{
        width: 120px;
        aspect-ratio: 1/1;
        object-fit: cover;
        border-radius: 50%;
        margin: 0 auto; /* Center the image horizontally */
        display: block; /* Ensure block-level rendering to center horizontally */
        margin-bottom: 20px;
      }

      .profile h2{
        font-size: 32px;
        margin: 0 0 25px:
      }

      .profile p{
        color: rgba(0,0,0,0.38);
        margin: 0 0 6px;
        font-weight:500;
        font-size:1.5rem;
      }
      


        
    </style>

</head>
<body>


      

<div class="container text-center">
  <div class="row">
    <div class="col">
      <div class="profile" >
        <?php
        
        if(isset($_SESSION['user_login'])){
          $conn = conndb();
          $user_id = $_SESSION['user_login'];

          $stmt = $conn->query("SELECT * from users WHERE user_id = '$user_id'");
         
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
        <?php
          if($row['user_image'] == '') {
              echo '<img src="default-avatar.jpg">';
          } else {
              echo '<img src="upload/' . $row['user_image'] . '">';
          }
        ?>
        <h2> <?php echo $row['username']?></h2>

        <p><?php echo $row['first_name'].' '.$row['last_name']?></p>


        
        <div class="position-absolute top-0 end-0">
          <!-- Button trigger modal -->
            <button type="button" class="btn btn-outline-secondary" style="margin:20px;" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
              </svg>
              Edit profile
            </button>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="profile" >
        <h2>Buyer profile</h2>
      </div>
    
    </div>
    <div class="col">
      <div class="profile" >
        <h2>Seller profile</h2>
      </div>
    </div>
  </div>
</div>




<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="editprofile.php" method="post" enctype="multipart/form-data"> 
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <?php if($user_id){ ?>
        <?php }else{ 
          header('location: login.php');
          exit;
          ?>
        <?php } ?>
      <div class="mb-3" >
      <?php
        if($row['user_image'] == '') {
            echo '<img src="default-avatar.jpg" class="pic">';
          }else{
            echo '<img src="upload/'.$row['user_image'].'"  class="pic">'; 
          }
        ?>
        <label for="formFile" class="form-label">Profile</label>
        <input type="file" class="form-control" name="imgfile" id="formFile" accept="image/jpeg, image/png, image/jpg" >
      </div>
      <div class=" mb-3">
        <label for="formFile" class="form-label">Username</label>
        <input type="text" class="form-control" value=" <?php echo $row['username']?>"  name="username" aria-label="username" aria-describedby="basic-addon1">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">First name & Last name</label>
        <input type="text" class="form-control" value=" <?php echo $row['first_name']?>" name="firstname">
        <input type="text"  class="form-control" value=" <?php echo $row['last_name']?>" name="lastname" style="margin-top:2px;">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" value=" <?php echo $row['email']?>" name="email">
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">Date Of Birth</label>
        <input type="date"  class="form-control" value=" <?php echo $row['date_of_birth']?>" name="dob">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Address</label>
        <input type="text"  class="form-control" value=" <?php echo $row['address']?>" name="address" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" name="editprofile" class="btn btn-primary">Save changes</button>
      </div>
    </from>
    </div>
    <div class="row">
      
  </div>
</div>





</body>
</html>