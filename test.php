<?php
require 'conn.php';
require 'header.php';
require 'menubar.php';
require 'func.php';
?>
<section class="section collection">
        <div class="container">
            <ul class="collection-list has-scrollbar">;
        <?php
                    $result = tablequery('categories');
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) { 
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
                    $conn->close();
                ?>
            </ul>
      </div>
</section>




