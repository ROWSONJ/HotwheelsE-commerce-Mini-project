<?php

  $user = $_SESSION['user_login'];

if (!checkLogin()) {
    $link = "../views/login.php";
    $text = "Login / Register";
    $profile_img = '<ion-icon name="person-outline" aria-hidden="true"></ion-icon>';
} else {
    $link = "../views/profile.php";
    $text = "Profile";
}

if ($user) {
    $result = tablequery("SELECT * FROM users WHERE user_id = '$user'");
    
    if ($result) {
        $row = $result->fetch(PDO::FETCH_ASSOC);

        if (!empty($row['user_image'])) {
            $profile_img = '<img src="../assets/images/' . $row['user_image'] . '" width="22" height="22" loading="lazy"
            alt="' . $row['user_name'] . '" class="dummy-profile">';
        } else {
            $dummy_txt = strtoupper(substr($row['first_name'], 0, 1) . substr($row['last_name'], 0, 1));
            $profile_img = '<div class="dummy-profile">
                <p class="dummy-profile-text">' . $dummy_txt . '</p>
            </div>';
        }
    } else {
        $profile_img = '<ion-icon name="person-outline" aria-hidden="true"></ion-icon>';
    }
}


?>
<!-- 
    - #HEADER
  -->
  <link rel="stylesheet" href="..\assets\css\style.css">
  <div class="page__overlay"></div>
  <header class="header" data-header>
  <div class="cart-container">
    <div class="cart" style="top: 0;">
            <div class="cart-top">Add To Card</div>
              
              <div class="cart-inner">
                <div class="cart-title">
                <span class="material-symbols-outlined" style="position: absolute; left: 0; top: 100%; width: 24px; height: 30px; margin-top: -15px; transform: translateY(-50%);">check_circle</span>
<h2 class="#">Add to cart</h2>
                </div>
                    <div class="cart-item">
                      <div class="cart-item-warpper">
                        <div class="cart-item-img">
                          <img src="../assets/images/insta-1.jpg" width="64px" height="64px" alt="" class="cart-img">
                        </div>             
                      <div class="cart-item-detail">
                        <span class="material-symbols-outlined" style="position: absolute; width: 34px; height: 34px; background-position: -213px 0; 
                        right: 4px; top: 4px; padding: 0; transform: scale(0.72); cursor: pointer;">close</span>
                        <p class="cart-item-name">
                        <a href="#" class="a-item-name"> Earbuds sasa </a>
                        </p>
                        <span class="cart-item-price">$ 25</span>
                    </div>  
                  </div>

                  <div class="cart-item-warpper">
                        <div class="cart-item-img">
                          <img src="../assets/images/insta-1.jpg" width="64px" height="64px" alt="" class="cart-img">
                        </div>             
                      <div class="cart-item-detail">
                        <span class="material-symbols-outlined" style="position: absolute; width: 34px; height: 34px; background-position: -213px 0; 
                        right: 4px; top: 4px; padding: 0; transform: scale(0.72);">close</span>
                        <p class="cart-item-name">
                        <a href="#" class="a-item-name"> Earbuds sasa </a>
                        </p>
                        <span class="cart-item-price">$ 25</span>
                    </div>  
                  </div>
                  <div class="cart-item-warpper">
                        <div class="cart-item-img">
                          <img src="../assets/images/insta-1.jpg" width="64px" height="64px" alt="" class="cart-img">
                        </div>             
                      <div class="cart-item-detail">
                        <span class="material-symbols-outlined" style="position: absolute; width: 34px; height: 34px; background-position: -213px 0; 
                        right: 4px; top: 4px; padding: 0; transform: scale(0.72);">close</span>
                        <p class="cart-item-name">
                        <a href="#" class="a-item-name"> Earbuds sasa </a>
                        </p>
                        <span class="cart-item-price">$ 25</span>
                    </div>  
                  </div>
                  
                </div>
                  <div class="cart-bottom">
                    <div class="cart-total">
                    <h6>Total: <span class="cart-total-cast">$25</span></h6>
                    </div>
                    <div class="cart-button">
                      <a href="#" class="cart-btn2">View Cart (1)</a>
                      <a href="#" class="cart-btn1">Continue Shopping</a>
                  </div>

                </div>
              </div>
            </div>
          </div>

    <div class="container">
      <div class="overlay" data-overlay></div>

      <a href="../views/index.php" class="logo">
        <img src="../assets/images/fastlanelogo.svg" width="160" height="50" alt="FastLane logo">
      </a>

      <button class="nav-open-btn" data-nav-open-btn aria-label="Open Menu">
        <ion-icon name="menu-outline"></ion-icon>
      </button>

      <nav class="navbar" data-navbar>

        <button class="nav-close-btn" data-nav-close-btn aria-label="Close Menu">
          <ion-icon name="close-outline"></ion-icon>
        </button>

        <a href="#" class="logo">
          <img src="../assets/images/fastlanelogo.svg" width="190" height="50" alt="FastLane logo">
        </a>

        <ul class="navbar-list">

          <li class="navbar-item">
            <a href="../views/index.php" class="navbar-link">Home</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link">Ready to ship</a>
          </li>
          
          <li class="navbar-item">
            <a href="#" class="navbar-link">Upcoming</a>
          </li>

          <li class="navbar-item">
            <a href="profile.php" class="navbar-link">About</a>
          </li>

          <li class="navbar-item">
            <a href="#" class="navbar-link">Contact</a>
          </li>

          <li class="navbar-item">
            <a href="../global/test.php" class="navbar-link">Test</a>
          </li>
        </ul>

        <ul class="nav-action-list">

          <li>
            <button class="nav-action-btn">
              <ion-icon name="search-outline" aria-hidden="true"></ion-icon>

              <span class="nav-action-text">Search</span>
            </button>
          </li>

          <li>
            <a href="<?=$link?>" class="nav-action-btn">
              <?=$profile_img?>

              <span class="nav-action-text"><?=$text?></span>
            </a>
          </li>

          <li>
            <a href="#" class="nav-action-btn">
              <ion-icon name="heart-outline" aria-hidden="true"></ion-icon>

              <span class="nav-action-text">Wishlist</span>

              <data class="nav-action-badge" value="5" aria-hidden="true">5</data>
            </a>
          </li>

          <li>
            <button class="nav-action-btn" id="cart-icon">
            <ion-icon name="bag-outline" aria-hidden="true"></ion-icon>
                
              <data class="nav-action-text" value="318.00">Basket: <strong>$318.00</strong></data>

              <data class="nav-action-badge" value="4" aria-hidden="true">4</data>
            </button>
          </li>

        </ul>

      </nav>
      
    </div>
  </header>