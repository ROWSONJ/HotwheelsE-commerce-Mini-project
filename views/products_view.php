<?php
ob_start(); 
if (!isset($_GET['product_id'])) {
  header("refresh: 10; http://localhost/mini-project-yrs3/mini-project/views/404.php");
  exit; // Exit to prevent further code execution
}

$getid = $_GET['product_id'];

require '../global/conn.php'; // Assuming this is a PDO database connection script
require '../global/header.php';
require '../global/menubar.php';
require '../global/func.php';

$conn = conndb(); // Assuming conndb() returns a PDO connection

$sql = "SELECT p.*, c.category_name, b.carbrand_name FROM products p
      LEFT JOIN categories c ON p.category_id = c.category_id
      LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id
      WHERE product_id = '$getid'";

$result = $conn->query($sql);

if ($result) {
  $row = $result->fetch(PDO::FETCH_ASSOC);

  if (!$row) {
      // Handle the case where no result is found
      header("Location: http://localhost/mini-project-yrs3/mini-project/views/404.php");
      exit; // Exit to prevent further code execution
  }

  // Use the $row data as needed
} else {
  // Handle any database query errors
  echo "Database error: " . $conn->error;
}
ob_end_flush();
?>

<main>
<link rel="stylesheet" href="..\assets\css\product_view.css">
        <section class="sectionp">
            <div class="product-view">
                <div class="product-image">
                    <img src="../assets/images/<?=$row['p_image']?>" alt="Product image">
                </div>

                <div class="product-info">
                  <div class="product name">
                    <h1 class="product-name"><?=$row['product_name']?></h1>
                    <p class="prod-name"><?=$row['category_name']?> | <?=$row['carbrand_name']?></p>
              </div>
              <hr class="hr-product">

                    <div class="product-price">
                        <div class="price ask">
                          <p class="p price-1">LOWEST ASK</p>
                          <p class="p price-2">฿ <?=$row['price']?></p>
                        </div>
                        <div class="price bid">
                          <p class="price-1">HIGHEST BIT</p>
                          <p class="price-2">---</p>
                        </div>
                        <div class="price last-sale">
                          <p class="price-1">LAST SALE</p>
                          <p class="price-2">---</p>
                        </div>
                    </div>
                    <hr class="hr-product">

                    <div class="product tag">
                      <p class="tag-head"> Available listing </p>
                      
                      <ul class="tag-list">
                        <li class="tag-list-item">
                      
                        <div class="tag-icon">
                          <div class="tag-icon-img">
                            <img src="../assets/images/service-1.png" width="53" height="28" loading="lazy" class="icon-img" alt="Service icon">
                          </div>
                    </div>
                      <p class="tag-discription"> Ready to ship </p>                     
                        
                    </li>
                      </ul>
                    </div>
                    <hr class="hr-product">

                    <div class="product-logis">
                      <p class="logis-head"> Shipping Delivery </p>
                      
                      <div class="logis-item">
                      <span class="material-symbols-outlined">bolt</span>
                      
                      <div class="logis-type">
                        <p class="logis-name">Express delivery</p>
                        <p class="logis-detail">Schedule delivery after authentication</p>
                        </div>
                      </div>

                      <div class="logis-item">
                        <span class="material-symbols-outlined">package_2</span>
                      <div class="logis-type">
                        <p class="logis-name">Standard delivery</p>
                        <p class="logis-detail">Ship via logistic partner (2-4 days)</p>
                        </div>
                      </div>
                    
                      <div class="logis_alert">
                        <div class="logis-alert-detail" >
                      <span class="material-symbols-outlined" style= "color: rgb(211, 47, 47);">error</span>
                      <span class="span">New drops items may experience slight delay according to the distributor</span>
                      </div>  
                    </div>
                    </div>
                    
                    <hr class="hr-product">
                    <div class="product">
                    <div class="product-quantity">
                        <h4 class="product-quantity-title">Quantity</h4>
                        <div class="product-quantity-container">
                            <button class="product-quantity-btn" data-action="decrement">-</button>
                            <input class="product-quantity-input" type="number" value="1" min="1" max="10">
                            <button class="product-quantity-btn" data-action="increment">+</button>
                        </div>
                    </div>
                    </div>
                    <hr class="hr-product">
                    
                    <div class="product-action">
                        <button class="sell-btn" type="button">Sell</button> 
                        <button class="add-to-cart-btn">
                          <span class="transition"></span>
                                  <span class="gradient"></span>
                            <span class="label">Add to Cart</span>
                              </button>
                        <!--<button class="add-to-cart-btn" type="button">Add to Cart</button>-->
                    </div>
                </div>
            </div>
        </section>

        <link rel="stylesheet" href="../assets/css/style.css">
        <section class="section special">
        <div class="container">
          <!--
          <div class="special-banner" style="background-image: url('./assets/images/special-banner.jpg')">
            <h2 class="h3 banner-title">New Trend Edition</h2>

            <a href="#" class="btn btn-link">
              <span>Explore All</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>
          -->
          
          <div class="special-product">

            <h2 class="h2 section-title">
              <span class="text">You may also like</span>

              <span class="line"></span>
            </h2>

            <ul class="has-scrollbar">
              <?php

        $result = tablequery('SELECT p.*, c.category_name, b.carbrand_name FROM products p
                              LEFT JOIN categories c ON p.category_id = c.category_id
                              LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id
                              ORDER BY RAND() LIMIT 4');
      
              if ($result) {
                // Use foreach to iterate through the result set
                foreach ($result as $row) {
                  $isNewProduct = false; // Initialize a flag for checking if the product is new

      // Check if the product is new (released within the last week)
      if (!empty($row['Release_Date'])) {
      $releaseDate = strtotime($row['Release_Date']);
      $oneWeekAgo = strtotime('-1 week');
      if ($releaseDate > $oneWeekAgo) {
      $isNewProduct = true;
          }
      } //var_dump("isNewProduct: " . ($isNewProduct ? "true" : "false"));
                    echo '<li class="product-item" release-date="'. $row['Release_Date'] .'">
                        <div class="product-card" tabindex="0">
                            <figure class="card-banner">
                            <a class="image-contain" href="' . $_SERVER['PHP_SELF'] . '?product_id=' . $row['product_id'] . '"><img src="../assets/images/' . $row['p_image'] . '" width="312" height="350" loading="lazy"
                                    alt="' . $row['product_name'] . '" class="image-contain"></a>';

              if($isNewProduct){
                echo '<div class="card-badge">New</div>';
              }  
                       echo '      
                                <ul class="card-action-list">
                                    <li class="card-action-item">
                                        <button class="card-action-btn" aria-labelledby="card-label-1">
                                            <ion-icon name="cart-outline"></ion-icon>
                                        </button>
                
                                        <div class="card-action-tooltip" id="card-label-1">Add to Cart</div>
                                    </li>
                
                                    <li class="card-action-item">
                                        <button class="card-action-btn" aria-labelledby="card-label-2">
                                            <ion-icon name="heart-outline"></ion-icon>
                                        </button>
                
                                        <div class="card-action-tooltip" id="card-label-2">Add to Whishlist</div>
                                    </li>
                
                                    <li class="card-action-item">
                                        <button class="card-action-btn" aria-labelledby="card-label-3">
                                            <ion-icon name="eye-outline"></ion-icon>
                                        </button>
                
                                        <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                                    </li>
                
                                    <li class "card-action-item">
                                        <button class="card-action-btn" aria-labelledby="card-label-4">
                                            <ion-icon name="repeat-outline"></ion-icon>
                                        </button>
                
                                        <div class="card-action-tooltip" id="card-label-4">Compare</div>
                                    </li>
                
                                </ul>
                            </figure>
                
                            <div class="card-content">
                
                                <div class="card-cat">
                                    <a href="#" class="card-cat-link">'.$row['category_name'].'</a> /
                                    <a href="#" class="card-cat-link">'.$row['carbrand_id'].'</a>
                                </div>
                
                                <h3 class="h3 card-title">
                                    <a href="#">'.$row['product_name'].'</a>
                                </h3>
                
                                <data class="card-price" value="'.$row['price'].'">'.$row['price'].'</data>
                
                            </div>
                
                        </div>
                    </li>';
                }
            } else {
                echo "0 results";
            }             
              ?>

            </ul>

          </div>

        </div>
      </section>
    </main>
    <?php require '../global/footer.php'; ?>

<!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>

  <!-- 
    - custom js link
  -->
  <script src="../assets/js/script.js"></script>


  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <!-- 
    - tailwindcss link
  -->

</body>

</html>