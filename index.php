<?php 
  require 'conn.php';
  require 'header.php'; 
  require 'menubar.php';
  require 'func.php';
?>
  <main>
    
    <article>

      <!-- 
        - #HERO
      -->

      <section class="section hero" style="background-image: url('./assets/images/hotwheels-banner02.png')">
        <div class="container">

          <h2 class="h1 hero-title">
            <strong>EXPLORE WHEELS</strong>
            <strong>COLLECTIONS</strong>
          </h2>

         <!--<p class="hero-text">
            Competently expedite alternative benefits whereas leading-edge catalysts for change. Globally leverage
            existing an
            expanded array of leadership.
          </p>-->

          <button class="btn btn-primary">
            <span>Shop Now</span>

            <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
          </button>

        </div>
      </section>
      
      <!-- 
        - #COLLECTION
      -->

      <section class="section collection">
        <div class="container">

          <h2 class="h2 section-title">Collections</h2>
            <ul class="collection-list has-scrollbar">;
        <?php
                    $result = tablequery('SELECT * FROM categories');
                    // Check if the query executed successfully
                    if ($result) {
                        // Use foreach to iterate through the result set
                        foreach ($result as $row)  { 
                            echo '<li>
                            <div class="collection-card" style="background-image: url(./assets/images/'.$row['c_image'].')">
                                <h3 class="h4 card-titlet">'.$row['category_name'].'</h3>
                                <a href="#" class="btn btn-secondary">
                                    <span>Explore All</span>
                                    <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                                </a>
                            </div>
                        </li>';    
                        }
                    }else {
                        echo "0 results";
                    }
                ?>
            </ul>
      </div>
      </section>

      <!-- 
        - #UPCOMING
      -->
      <section class="section upcoming">
        <div class="container">
          <h2 class="h2 section-title">Upcoming Release</h2>
      <?php
      $result = tablequery('SELECT * FROM bannerlists');
      if ($result) {
        // Use foreach to iterate through the result set
        foreach ($result as $row)  { 
            echo '<div class = "section upcoming-list" style="background-image: url(./assets/images/' . $row['bn_image'] . ')">
            <div class="container">
                      <h2 class="h1 hero-title">
                        <strong>' . $row['bannerlist_infoL1'] . '</strong>
                      </h2>
                      <p class="hero-text">
                        ' . $row['bannerlist_infoL2'] . '
                      </p>
                      <button class="btn btn-primary">
                        <span>Shop Now</span>
                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                      </button>
                    </div>
                  </div>';
          }
        }else {
            echo "0 results";
        }
      ?>
      </div>
      </section>

      <!-- 
        - #PRODUCT
      -->

      <section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Hot Wheels Products</h2>

          <ul class="filter-list">

          <li>
              <button class="filter-btn active" data-carbrand="All">All</button>
          </li>
          

          <!-- 
            - #FILTER & DISPLAY first two letter of carbrand_id
          -->

          <?php
$carbrands = [];
$result = tablequery('SELECT DISTINCT SUBSTRING(carbrand_id, 1, 2) AS carbrand_text FROM carbrands');

if ($result) {
    foreach ($result as $row)  { 
        $carbrand_text = $row['carbrand_text'];
        echo '<li>
            <button class="filter-btn active" data-carbrand="' . $carbrand_text . '">' . $carbrand_text . '</button>
        </li>';
    }
} else {
    echo "0 results";
}
?>
          </ul>
          
          <ul class="product-list" id="product-list">


          <!-- 
            - #LISTS OF PRODUCT
          -->
          
            <?php
          $result = tablequery('SELECT p.*, c.category_name, b.carbrand_name FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id
                ORDER BY p.Release_Date DESC');
        

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
      }  
      echo '<li class="product-item" release-date="'. $row['Release_Date'] .'">
      <div class="product-card" tabindex="0">
          <figure class="card-banner">
              <img src="./assets/images/' . $row['p_image'] . '" width="312" height="350" loading="lazy"
                  alt="' . $row['product_name'] . '" class="image-contain">';

  // Display the "New" badge if it's a new product
  if ($isNewProduct) {
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
                      <div class="card-action-tooltip" id="card-label-2">Add to Wishlist</div>
                  </li>
                  <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-3">
                          <ion-icon name="eye-outline"></ion-icon>
                      </button>
                      <div class="card-action-tooltip" id="card-label-3">Quick View</div>
                  </li>
                  <li class="card-action-item">
                      <button class="card-action-btn" aria-labelledby="card-label-4">
                          <ion-icon name="repeat-outline"></ion-icon>
                      </button>
                      <div class="card-action-tooltip" id="card-label-4">Compare</div>
                  </li>
              </ul>
          </figure>
          <div class="card-content">
              <div class="card-cat">
                  <a href="#" class="card-cat-link">' . $row['category_name'] . '</a> / 
                  <a href="#" class="card-cat-link">' . $row['carbrand_name'] . '</a>
              </div>
              <h3 class="h3 card-title">
                  <a href="#">' . $row['product_name'] . '</a>
              </h3>
              <data class="card-price" value="180.85">฿' . $row['price'] . '</data>
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
      </section>

      <!-- 
        - #CTA
      -->

      <section class="section cta">
        <div class="container">

          <ul class="cta-list">

            <li>
              <div class="cta-card" style="background-image: url('./assets/images/cta-1.webp')">
                
                <h3 class="h2 card-title">RACE YOUR WAY </h3>

                <p class="card-subtitle">With so many exciting new challenges and crazy game modes</p>
                <a href="#" class="btn btn-link">
                  <span>View</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

            <li>
              <div class="cta-card" style="background-image: url('./assets/images/cta-2.webp')">
                <h3 class="h2 card-title">THE RACE CONTINUES</h3>

                <p class="card-subtitle">Hot Wheels Unleashed 2 - Turbocharged</p>
                <a href="#" class="btn btn-link">
                  <span>View</span>

                  <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                </a>
              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #SPECIAL
      -->

      <section class="section special">
        <div class="container">

          <div class="special-banner" style="background-image: url('./assets/images/special-banner.jpg')">
            <h2 class="h3 banner-title">New Trend Edition</h2>

            <a href="#" class="btn btn-link">
              <span>Explore All</span>

              <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
            </a>
          </div>

          <div class="special-product">

            <h2 class="h2 section-title">
              <span class="text">Nike Special</span>

              <span class="line"></span>
            </h2>

            <ul class="has-scrollbar">

              <li class="product-item">
                <div class="product-card" tabindex="0">

                  <figure class="card-banner">
                    <img src="./assets/images/product-1.jpg" width="312" height="350" loading="lazy"
                      alt="Running Sneaker Shoes" class="image-contain">

                    <div class="card-badge">New</div>

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

                      <li class="card-action-item">
                        <button class="card-action-btn" aria-labelledby="card-label-4">
                          <ion-icon name="repeat-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-4">Compare</div>
                      </li>

                    </ul>
                  </figure>

                  <div class="card-content">

                    <div class="card-cat">
                      <a href="#" class="card-cat-link">Men</a> /
                      <a href="#" class="card-cat-link">Women</a>
                    </div>

                    <h3 class="h3 card-title">
                      <a href="#">Running Sneaker Shoes</a>
                    </h3>

                    <data class="card-price" value="180.85">$180.85</data>

                  </div>

                </div>
              </li>

              <li class="product-item">
                <div class="product-card" tabindex="0">

                  <figure class="card-banner">
                    <img src="./assets/images/product-2.jpg" width="312" height="350" loading="lazy"
                      alt="Leather Mens Slipper" class="image-contain">

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

                      <li class="card-action-item">
                        <button class="card-action-btn" aria-labelledby="card-label-4">
                          <ion-icon name="repeat-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-4">Compare</div>
                      </li>

                    </ul>
                  </figure>

                  <div class="card-content">

                    <div class="card-cat">
                      <a href="#" class="card-cat-link">Men</a> /
                      <a href="#" class="card-cat-link">Sports</a>
                    </div>

                    <h3 class="h3 card-title">
                      <a href="#">Leather Mens Slipper</a>
                    </h3>

                    <data class="card-price" value="190.85">$190.85</data>

                  </div>

                </div>
              </li>

              <li class="product-item">
                <div class="product-card" tabindex="0">

                  <figure class="card-banner">
                    <img src="./assets/images/product-3.jpg" width="312" height="350" loading="lazy"
                      alt="Simple Fabric Shoe" class="image-contain">

                    <div class="card-badge">New</div>

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

                      <li class="card-action-item">
                        <button class="card-action-btn" aria-labelledby="card-label-4">
                          <ion-icon name="repeat-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-4">Compare</div>
                      </li>

                    </ul>
                  </figure>

                  <div class="card-content">

                    <div class="card-cat">
                      <a href="#" class="card-cat-link">Men</a> /
                      <a href="#" class="card-cat-link">Women</a>
                    </div>

                    <h3 class="h3 card-title">
                      <a href="#">Simple Fabric Shoe</a>
                    </h3>

                    <data class="card-price" value="160.85">$160.85</data>

                  </div>

                </div>
              </li>

              <li class="product-item">
                <div class="product-card" tabindex="0">

                  <figure class="card-banner">
                    <img src="./assets/images/product-4.jpg" width="312" height="350" loading="lazy"
                      alt="Air Jordan 7 Retro " class="image-contain">

                    <div class="card-badge"> -25%</div>

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

                      <li class="card-action-item">
                        <button class="card-action-btn" aria-labelledby="card-label-4">
                          <ion-icon name="repeat-outline"></ion-icon>
                        </button>

                        <div class="card-action-tooltip" id="card-label-4">Compare</div>
                      </li>

                    </ul>
                  </figure>

                  <div class="card-content">

                    <div class="card-cat">
                      <a href="#" class="card-cat-link">Men</a> /
                      <a href="#" class="card-cat-link">Sports</a>
                    </div>

                    <h3 class="h3 card-title">
                      <a href="#">Air Jordan 7 Retro </a>
                    </h3>

                    <data class="card-price" value="170.85">$170.85 <del>$200.21</del></data>

                  </div>

                </div>
              </li>

            </ul>

          </div>

        </div>
      </section>





      <!-- 
        - #SERVICE
      -->

      <section class="section service">
        <div class="container">

          <ul class="service-list">

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-1.png" width="53" height="28" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Free Shiping</h3>

                  <p class="card-text">
                    All orders over <span>$150</span>
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-2.png" width="43" height="35" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Quick Payment</h3>

                  <p class="card-text">
                    100% secure payment
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-3.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">Free Returns</h3>

                  <p class="card-text">
                    Money back in 30 days
                  </p>
                </div>

              </div>
            </li>

            <li class="service-item">
              <div class="service-card">

                <div class="card-icon">
                  <img src="./assets/images/service-4.png" width="40" height="40" loading="lazy" alt="Service icon">
                </div>

                <div>
                  <h3 class="h4 card-title">24/7 Support</h3>

                  <p class="card-text">
                    Get Quick Support
                  </p>
                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #INSTA POST
      -->

      <section class="section insta-post">

        <ul class="insta-post-list has-scrollbar">

          <li class="insta-post-item">
            <img src="./assets/images/insta-1.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-2.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-3.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-4.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-5.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-6.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-7.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li class="insta-post-item">
            <img src="./assets/images/insta-8.jpg" width="100" height="100" loading="lazy" alt="Instagram post"
              class="insta-post-banner image-contain">

            <a href="#" class="insta-post-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

        </ul>

      </section>

    </article>
  </main>

<?php require 'footer.php'; ?>

  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top-btn" data-go-top>
    <ion-icon name="arrow-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

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