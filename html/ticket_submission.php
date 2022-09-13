<?php

require_once('../database/config.php');

if (isset($_POST['order'])) {
    $product = $_POST['radio'] ?? '';
    $user = $_POST['user'] ?? '';

    if (empty($product) || empty($user)) {
        echo "Missing fields...";
    } else {
        $query = "
        INSERT INTO orders (product, user) VALUES (:product, :user)
        ";   
    
        $check = $pdo->prepare($query);
        $check->bindParam(':product', $product, PDO::PARAM_STR);
        $check->bindParam(':user', $user, PDO::PARAM_STR);
        $check->execute();
    
        if ($check->rowCount() > 0) {
            header("location: ./order_success.html");
        } else {
            echo "Error during registration $sql. " . $pdo->error;
        }
    }    
}

?>