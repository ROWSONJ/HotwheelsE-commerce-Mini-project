<?php 
    require '../global/conn.php';
    require '../global/func.php';
    require '../global/header.php'; 
    require '../global/menubar.php';

    if (isset($_SESSION['user_login'])) {
      $userId = $_SESSION['user_login'];
  } else {
      $userId = ''; // or any default value you want
  }
    print_r($userId);
?>

<section class="section upcoming" id="upcoming">
        <div class="container">
          <h2 class="h2 section-title">Upcoming Release</h2>
      <?php
      $result = tablequery('SELECT * FROM bannerlists');
      if ($result) {
        // Use foreach to iterate through the result set
        foreach ($result as $row)  { 
            echo '<div class = "section upcoming-list" style="background-image: url(../assets/images/' . $row['bn_image'] . ')">
            <div class="container '.$row['text_layout'].'">
                      <h2 class="h1 hero-title">
                        <span>
                        <strong>' . $row['bannerlist_infoL1'] . '</strong>
                      </h2>
                      <p class="hero-text">
                        ' . $row['bannerlist_infoL2'] . '
                      </p>
                      <a href="../views/products_view.php?product_id=' . $row['product_id'] . '"><button class="btn btn-primary">
                        <span>Shop Now</span>
                        <ion-icon name="arrow-forward-outline" aria-hidden="true"></ion-icon>
                      </button></a>
                    </div>
                  </div>';
          }
        }else {
            echo "0 results";
        }
      ?>
      </div>

      <p>Time remaining: <span id="countdown"></span></p>
    
    <!-- Your payment form goes here -->

    <script>
        // Set the countdown target time (in seconds)
        const countdownDuration = 600; // 10 minutes

        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            const now = new Date().getTime() / 1000;
            const targetTime = now + countdownDuration;
            const interval = 1000; // Update every 1 second

            const countdown = setInterval(function() {
                const currentTime = new Date().getTime() / 1000;
                const timeRemaining = targetTime - currentTime;

                if (timeRemaining <= 0) {
                    clearInterval(countdown);
                    countdownElement.textContent = 'Time is up!';
                    // You can trigger an action here, e.g., disable the payment form
                } else {
                    const minutes = Math.floor(timeRemaining / 60);
                    const seconds = Math.floor(timeRemaining % 60);
                    countdownElement.textContent = `${minutes}m ${seconds}s`;
                }
            }, interval);
        }

        // Start the countdown
        updateCountdown();
    </script>
      </section>


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
  <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>