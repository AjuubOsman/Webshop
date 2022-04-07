<?php
session_start();
include '../../private/connection.php';



    $userid =  $_SESSION['gebruikersid'];


    $stmt = $conn->prepare("INSERT INTO orders (user_ID)
                        VALUES(:gebruikersid)");
    $stmt->bindParam(':gebruikersid', $userid);

    $stmt->execute();

    $product_ID =  $_POST['prodid'];
    $amount = $_POST['amount'];


    $sql = ("SELECT order_ID from orders");
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);


    $stmt = $conn->prepare("SELECT *  FROM shoppingcart where user_ID = :gebruikersid");
    $stmt ->bindParam(':gebruikersid' , $userid);
    $stmt->execute();
    $result = $stmt->fetchAll();

    foreach ($result as $product){

        $stmt = $conn->prepare("INSERT INTO producten_orders (order_ID, product_ID, amount)
                            VALUES(:order_ID,:prodid, :amount)");
        $stmt->bindParam(':order_ID',  $row["order_ID"]);
        $stmt->bindParam(':prodid', $product["product_ID"]);
        $stmt->bindParam(':amount', $product["amount"]);

        $stmt->execute();
    }





$stmt = $conn->prepare("DELETE FROM shoppingcart");
$stmt->execute();



    header('location: ../index.php?page=shoppingcart');





?>