<?php
session_start();
include '../../private/connection.php';

    $userid =  $_SESSION['gebruikersid'];


    $stmt = $conn->prepare("INSERT INTO orders (user_ID)
                        VALUES(:gebruikersid)");
    $stmt->bindParam(':gebruikersid', $userid);

    $stmt->execute();

    $order_ID = $conn->lastInsertId();

    $stmt = $conn->prepare("SELECT *  FROM shoppingcart where user_ID = :gebruikersid");
    $stmt ->bindParam(':gebruikersid' , $userid);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $product){

        $stmt = $conn->prepare("INSERT INTO producten_orders (order_ID, product_ID, amount, price)
                            VALUES(:order_ID,:prodid, :amount, :price)");
        $stmt->bindParam(':order_ID',  $order_ID);
        $stmt->bindParam(':prodid', $product["product_ID"]);
        $stmt->bindParam(':amount', $product["amount"]);
        $stmt->bindParam(':price', $product["price"]);

        $stmt->execute();
    }

$stmt = $conn->prepare("DELETE FROM shoppingcart");
$stmt->execute();

header('location: ../index.php?page=shoppingcart');
?>