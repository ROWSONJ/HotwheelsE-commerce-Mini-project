<?php

require_once '../global/conn.php';

if (isset($_SESSION['user_login']) && isset($_POST['deleteacc'])) {
    $user_id = $_SESSION['user_login'];
    $conn = conndb();

    // Check if the user's credentials match
    $check_data = $conn->prepare("SELECT * FROM users WHERE user_id = :user_id");
    $check_data->bindParam(":user_id", $user_id);
    $check_data->execute();
    $row = $check_data->fetch(PDO::FETCH_ASSOC);

    if ($check_data->rowCount() > 0 && password_verify($_POST['password'], $row['password'])) {
        // Password is correct; proceed with account deletion
        $stmt = $conn->prepare("DELETE FROM users WHERE user_id = :user_id");
        $stmt->bindParam(":user_id", $user_id);
        $stmt->execute();

        // Destroy the session and log the user out
        session_destroy();

        // Send a response to the client
        echo "success";
    } else {
        echo "error";
    }
}
?>
