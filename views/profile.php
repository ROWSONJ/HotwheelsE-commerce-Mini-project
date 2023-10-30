<?php 
    require '../global/conn.php';
    require '../global/func.php';
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
        top:50%;
        left:50%;
        translate: -50% -50%;
        width:90%;
        padding: 70px 30px 44px;
        border-radius: 1.25rem;
        background: #fff;
        text-align: center;
        margin-top: 200px;
      }

      .profile > img{
         width: 120px;
         aspect-ratio: 1/1;
         object-fit: cover;
         border-radius: 50%;
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
      <div class="profile">
        <?php
        
        if(isset($_SESSION['user_login'])){
          $conn = conndb();
          $user_id = $_SESSION['user_login'];

          $stmt = $conn->query("SELECT * from users WHERE user_id = '$user_id'");

          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);

        }
        ?>
        <img src="../assets/images/tumblr_b006d16d4b0d4a213d0ad2b818e6e6b8_3df43155_540.jpg" alt="">
        
        <h2> <?php echo $row['username']?></h2>

        <p><?php echo $row['first_name'].' '.$row['last_name']?>/p>

        <div class="position-absolute top-0 end-0">
          <a href='editprofile.php'>
            <button type="button" class="btn btn-outline-secondary" style="margin:20px;">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
              </svg>
              Button
            </button>
          </a>
        </div>
      </div>
    </div>
    <div class="col">
      buyer
    </div>
    <div class="col">
      seller
    </div>
  </div>
</div>


 <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>



</body>
</html>