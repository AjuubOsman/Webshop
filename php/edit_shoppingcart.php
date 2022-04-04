<?php
session_start();
include '../../private/connection.php';

$productid = $_POST['prodid'];
$userid =  $_SESSION['gebruikersid'];
$amount = $_POST['amount'];

    $stmt = $conn->prepare("UPDATE shoppingcart SET amount =  :amount  where user_ID = :gebruikersid and product_ID = :prodid");
    $stmt ->bindParam(':gebruikersid' , $userid);
    $stmt ->bindParam(':prodid' , $productid);
    $stmt->bindParam(':amount', $amount);
    $stmt->execute();

if ($amount == 0) {
    $stmt2 = $conn->prepare("DELETE FROM shoppingcart WHERE amount =:amount ");
    $stmt2->bindParam(':amount', $amount);
    $stmt2->execute();
}

header('location: ../index.php?page=shoppingcart');
?>
