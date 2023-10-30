<?php 
    require '../global/conn.php';
    require '../global/header.php'; 
    require '../global/menubar.php';

    if(!isset($_SESSION['user_login'])){
      //อย่าลืมทำalertให้เข้าสู่ระบบ
      header('location: login.php');
    }
    
?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<head><script src="../assets/js/color-modes.js"></script>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
<meta name="generator" content="Hugo 0.118.2">
<title>Profile</title>

<link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sidebars/">


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
   
      body {
        min-height: 100vh;
        min-height: -webkit-fill-available;
      }

      html {
        height: -webkit-fill-available;
      }

      main {
        height: 100vh;
        height: -webkit-fill-available;
        max-height: 100vh;
        overflow-x: auto;
        overflow-y: hidden;
      }

      .dropdown-toggle { outline: 0; }

      .btn-toggle {
        padding: .25rem .5rem;
        font-weight: 600;
        color: var(--bs-emphasis-color);
        background-color: transparent;
      }
      .btn-toggle:hover,
      .btn-toggle:focus {
        color: rgba(var(--bs-emphasis-color-rgb), .85);
        background-color: var(--bs-tertiary-bg);
      }

      .btn-toggle::before {
        width: 1.25em;
        line-height: 0;
        content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%280,0,0,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
        transition: transform .35s ease;
        transform-origin: .5em 50%;
      }

      [data-bs-theme="dark"] .btn-toggle::before {
        content: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='rgba%28255,255,255,.5%29' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M5 14l6-6-6-6'/%3e%3c/svg%3e");
      }

      .btn-toggle[aria-expanded="true"] {
        color: rgba(var(--bs-emphasis-color-rgb), .85);
      }
      .btn-toggle[aria-expanded="true"]::before {
        transform: rotate(90deg);
      }

      .btn-toggle-nav a {
        padding: .1875rem .5rem;
        margin-top: .125rem;
        margin-left: 1.25rem;
      }
      .btn-toggle-nav a:hover,
      .btn-toggle-nav a:focus {
        background-color: var(--bs-tertiary-bg);
      }

      .scrollarea {
        overflow-y: auto;
      }


      

      
      

      
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
      
      .buyer{
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
      .buyer h2{
        font-size: 32px;
        margin: 0 0 25px:
      }

      .buyer p{
        color: rgba(0,0,0,0.38);
        margin: 0 0 6px;
        font-weight:500;
        font-size:1.5rem;
      }

      .seller{
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
      .seller h2{
        font-size: 32px;
        margin: 0 0 25px:
      }

      .seller p{
        color: rgba(0,0,0,0.38);
        margin: 0 0 6px;
        font-weight:500;
        font-size:1.5rem;
      }
        
    </style>

</head>
<body>


    

    


<main class="d-flex flex-nowrap">
  

  <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px; ">
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Dashboard
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
          Orders
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
          Products
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-body-emphasis">
          <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
          Customers
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>

  

      

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
          </div>
        </div>
      </div>

      <div class="col">
        <div class="buyer" >
          <div class="position-absolute top-0 end-0">
            <button type="button" class="btn btn-outline-secondary" style="margin:20px;" >
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                  </svg>
                  view
            </button>
          </div> 
          <h2>Buyer profile</h2>
        </div>
      </div>

      <div class="col">
        <div class="seller" >
          <div class="position-absolute top-0 end-0">
              <button type="button" class="btn btn-outline-secondary" style="margin:20px;" >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                </svg>
                    view
              </button>
          </div> 
          <h2>Seller profile</h2>
        </div>
      </div>

    </div>
  </div>

</main>


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
        <input type="text" class="form-control" value=" <?php echo $row['username']?>"  name="username" >
      </div>
      <div class="mb-3">
        <label for="formFile" class="form-label">First name & Last name</label>
        <input type="text" class="form-control" value=" <?php echo $row['first_name']?>" name="firstname">
        <input type="text"  class="form-control" value=" <?php echo $row['last_name']?>" name="lastname" style="margin-top:2px;">
      </div>
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input class="form-control" type="email" value="<?php echo $row['email']?>" name="email" aria-label="readonly input example" readonly>
        
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

<script>
            /* global bootstrap: false */
      (() => {
        'use strict'
        const tooltipTriggerList = Array.from(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.forEach(tooltipTriggerEl => {
          new bootstrap.Tooltip(tooltipTriggerEl)
        })
      })()

    </script>

<!-- 
    
ionicon link--><script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script><script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>
</html>