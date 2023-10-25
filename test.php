<?php
require 'conn.php';
require 'header.php';
require 'menubar.php';
require 'func.php';
?>
<?php
if ($result) {
    // Use foreach to iterate through the result set
    foreach ($result as $row) {
        $isNewProduct = false;
        $releaseDate = strtotime($row['Release_Date']);
        $currentDate = strtotime('now');

        // Check if the product is new (released within the last week)
        if (!empty($row['Release_Date']) && $releaseDate <= $currentDate) {
            $isNewProduct = true;
        }

        // Only display the product if it's not a future release
        if (!$isNewProduct) {
            continue; // Skip this product
        }

        // The rest of your code to display the product
        echo '<li class="product-item" data-is-new="' . json_encode($isNewProduct) . '">
        <div class="product-card" tabindex="0">
            <!-- ... (your product card code here) ... -->
        </div>
        </li>';
    }
} else {
    echo "0 results";
}
?>

<?php 
require 'footer.php';
?>
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