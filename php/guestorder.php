<?php
session_start();
include '../../private/connection.php';










$stmt = $conn->prepare("INSERT INTO orders ()
                        VALUES()");
$stmt->execute();
$order_ID = $conn->lastInsertId();


//echo "<pre>", print_r($_SESSION['cart']), "</pre>";


foreach ($_SESSION['cart'] as $product){

    $stmt = $conn->prepare("INSERT INTO producten_orders (order_ID, product_ID, amount, price)
                            VALUES(:order_ID,:prodid, :amount, :price)");
    $stmt->bindParam(':order_ID',  $order_ID);
    $stmt->bindParam(':prodid', $product["id"]);
    $stmt->bindParam(':amount', $product["amount"]);
    $stmt->bindParam(':price', $product["price"]);

    $stmt->execute();
}

session_destroy();
session_start();

$_SESSION['order_ID'] = $order_ID;




header('location: ../index.php?page=shoppingcart');
?>