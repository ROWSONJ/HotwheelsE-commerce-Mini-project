<?php
require '../global/conn.php';
require '../global/func.php';

if (isset($_GET["q"])) {
    $query = $_GET["q"];
    $conn = conndb();

    // You should still sanitize user input to prevent SQL injection.
    // However, PDO does this with prepared statements.
    // The user's input is not used directly in the query to prevent SQL injection.

    $query_upper = strtoupper($query); // Convert the query to uppercase

$sql = "SELECT p.product_id, p.product_name, c.category_name, b.carbrand_name 
        FROM products p
        LEFT JOIN categories c ON p.category_id = c.category_id
        LEFT JOIN carbrands b ON p.carbrand_id = b.carbrand_id
        WHERE UPPER(p.product_name) LIKE :query
        OR UPPER(c.category_name) LIKE :query
        OR UPPER(b.carbrand_name) LIKE :query";

$stmt = $conn->prepare($sql);
$stmt->bindValue(':query', '%' . $query_upper . '%', PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($result) {
    foreach ($result as $row) {
        echo '<li>
            <div class="box-cat-tem1 cat-item">
                <a href="../views/allproduct.php?product_id=' . $row['product_id'] . '" class="cat-item-text">' . $row['product_name'] . '</a>
            </div>
            </li>';
    }
} else {
    echo "0 results";
}

}
?>

