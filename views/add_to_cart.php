<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a database connection, require it here
    require '../global/conn.php';

    // Retrieve data sent from the JavaScript code
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];

    // Add additional validation and sanitization as needed

    // Check if the product with the same product_id exists in the cart
    $conn = conndb(); // Replace with your database connection function
    $stmt = $conn->prepare("SELECT * FROM carts WHERE user_id = ? AND product_id = ?");
    $stmt->bind_param("ii", $user_id, $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    if ($result->num_rows > 0) {
        // Product already exists in the cart, update quantity and price
        $row = $result->fetch_assoc();
        $new_quantity = $row['quantity'] + $quantity;
        $new_price = $row['total'] + $total;

        $stmt = $conn->prepare("UPDATE carts SET quantity = ?, total = ? WHERE user_id = ? AND product_id = ?");
        $stmt->bind_param("diid", $new_quantity, $new_total, $user_id, $product_id);
        $success = $stmt->execute();
        $stmt->close();
        $cart_id = $row['cart_id'];
    } else {
        // Product doesn't exist in the cart, insert a new row
        $stmt = $conn->prepare("INSERT INTO carts (user_id, product_id, quantity, total, status) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiids", $user_id, $product_id, $quantity, $total, $status);
        $success = $stmt->execute();
        $stmt->close();
        $cart_id = $conn->insert_id; // Get the generated cart_id
    }

    // Close the database connection
    $conn->close();

    if ($success) {
        $response = ['success' => true, 'message' => 'Item added to the cart successfully', 'cart_id' => $cart_id];
    } else {
        $response = ['success' => false, 'message' => 'Failed to add the item to the cart'];
    }
} else {
    $response = ['success' => false, 'message' => 'Invalid request'];
}

header('Content-Type: application/json');
echo json_encode($response);
?>
