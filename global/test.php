<?php
require '../global/conn.php';
require '../global/header.php';
require '../global/menubar.php';
require '../global/func.php';
?>

<main class="product-overview">
<link rel="stylesheet" href="..\assets\css\product_view.css">
        <section class="sectionp">
            <div class="product-view">
                <div class="product-image">
                    <img src="../assets/images/pd_RLC_Exclusive_Honda_S2000.webp" alt="Product image">
                </div>
                <div class="product-info">
                  <div class="product name">
                    <h1 class="h1 product-name">RLC Exclusive Honda S2000</h1>
                    <p class="prod-name">test</p>
              </div><hr class="hr-product">
                    <div class="product pricq">
                        <div class="price ask">
                          <p class="pricq-1">LOWEST ASK</p>
                          <p class="pricq-2">---</p>
                        </div>
                        <div class="price bid">
                          <p class="pricq-1">HIGHEST BIT</p>
                          <p class="pricq-2">---</p>
                        </div>
                        <div class="price last-sale">
                          <p class="pricq-1">LAST SALE</p>
                          <p class="pricq-2">---</p>
                        </div>
                    </div><hr class="hr-product">
                    <div class="product-detail">
                        <h3 class="product-detail-title">Product Detail</h3>
                        <p class="product-detail-text">The Honda S2000 is a roadster that was manufactured by Japanese automaker Honda from 1999 to 2009. First shown as a concept car at the Tokyo Motor Show in 1995, the production version was launched on April 15, 1999 to celebrate the company's 50th anniversary. The S2000 is named for its engine displacement of two liters, carrying on in the tradition of the S500, S600, and S800 roadsters of the 1960s.</p>
                    </div>
                    <div class="product-quantity">
                        <h3 class="product-quantity-title">Quantity</h3>
                        <div class="product-quantity-container">
                            <button class="product-quantity-btn" data-action="decrement">-</button>
                            <input class="product-quantity-input" type="number" value="1" min="1" max="10">
                            <button class="product-quantity-btn" data-action="increment">+</button>
                        </div>
                    </div>
                    <div class="product-action">
                        <button class="product-action-btn" type="button">Add to Cart</button>
                    </div>
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