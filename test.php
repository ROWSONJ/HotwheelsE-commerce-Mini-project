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

<?php
if (isset($_POST['carbrand'])) {
    $carbrandName = $_POST['carbrand'];

    $result = tablequery("SELECT p.*, c.category_name, b.carbrand_name FROM products p
        LEFT JOIN categories c ON p.category_id = c.category_id
        LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id
        WHERE b.carbrand_name = '$carbrandName'");

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Output the filtered product list
            echo '<li class="product-item">
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
} else {
    echo "Invalid request";
}
?>

<section class="section product">
    <div class="container">

        <h2 class="h2 section-title">Hot Wheels Products</h2>

        <ul class="filter-list">

            <li>
                <button class="filter-btn active" data-carbrand="All">All</button>
            </li>
            <?php
            $result = tablequery('SELECT * FROM carbrands ORDER BY RAND() LIMIT 5');
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li>
                    <button class="filter-btn" data-carbrand="' . $row['carbrand_name'] . '">' . $row['carbrand_name'] . '</button>
                  </li>';
                }
            } else {
                echo "0 results";
            }
            ?>
        </ul>

        <ul class="product-list">
            <?php
            // Load the default products (when no filter is set)
            $result = tablequery('SELECT p.*, c.category_name, b.carbrand_name FROM products p
                LEFT JOIN categories c ON p.category_id = c.category_id
                LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id');
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    // Output the default product list
                    echo '<li class="product-item">
                    <div class="product-card" tabindex="0">
                    <figure class="card-banner">
                        <img src="./assets/images/' . $row['p_image'] . '" width="312" height="350" loading="lazy"
                            alt="' . $row['product_name'] . '" class="image-contain">';

                            if ($isNewProduct) {
                                echo '<div class="card-badge">New</div>';
                            }

                    echo '
                        <ul class="card-action-list">
                            <li class="card-action-item">
                                <!-- Add to Cart button -->
                            </li>
                            <li class="card-action-item">
                                <!-- Add to Wishlist button -->
                            </li>
                            <li class="card-action-item">
                                <!-- Quick View button -->
                            </li>
                            <li class="card-action-item">
                                <!-- Compare button -->
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