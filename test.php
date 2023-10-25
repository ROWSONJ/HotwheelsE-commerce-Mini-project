<?php
require 'conn.php';
require 'header.php';
require 'menubar.php';
require 'func.php';
?>

<section class="section product">
        <div class="container">

          <h2 class="h2 section-title">Hot Wheels Products</h2>

          <ul class="filter-list">

          <li>
              <button class="filter-btn active" data-carbrand="All">All</button>
          </li>
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
// Close the connection
?>

</ul>


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