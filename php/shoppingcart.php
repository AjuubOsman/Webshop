<?php
session_start();
include '../../private/connection.php';


$productid = $_POST['prodid'];
$userid =  $_SESSION['gebruikersid'];
$gast = $_SESSION['gast'];
$amount = $_POST['amount'];


$sql='SELECT * FROM shoppingcart where user_ID = :gebruikersid and product_ID = :prodid';
$stmt  = $conn->prepare($sql);
$stmt ->bindParam(':gebruikersid' , $userid);
$stmt ->bindParam(':prodid' , $productid);

$stmt ->execute();

if ($stmt ->rowCount() == 0) {

    $stmt = $conn->prepare("INSERT INTO shoppingcart (user_ID, product_ID,amount)
                        VALUES(:gebruikersid, :prodid, :amount)");
    $stmt->bindParam(':gebruikersid', $userid);
    $stmt->bindParam(':prodid', $productid);
    $stmt->bindParam(':amount', $amount);
    $stmt->execute();

    header('location: ../index.php?page=shoppingcart');
}
else{
    $stmt = $conn->prepare("UPDATE shoppingcart SET amount = amount + :amount  where user_ID = :gebruikersid and product_ID = :prodid");
    $stmt ->bindParam(':gebruikersid' , $userid);
    $stmt ->bindParam(':prodid' , $productid);
    $stmt->bindParam(':amount', $amount);
    $stmt->execute();
    header('location: ../index.php?page=shoppingcart');
}



?>