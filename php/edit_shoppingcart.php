<?php
session_start();
include '../../private/connection.php';

$productid = $_POST['prodid'];
$amount = $_POST['amount'];


if (isset($_SESSION['gebruikersid'])) {


    $userid = $_SESSION['gebruikersid'];



    $stmt = $conn->prepare("UPDATE shoppingcart SET amount =  :amount  where user_ID = :gebruikersid and product_ID = :prodid");
    $stmt->bindParam(':gebruikersid', $userid);
    $stmt->bindParam(':prodid', $productid);
    $stmt->bindParam(':amount', $amount);
    $stmt->execute();

    if ($amount == 0) {
        $stmt2 = $conn->prepare("DELETE FROM shoppingcart WHERE amount =:amount ");
        $stmt2->bindParam(':amount', $amount);
        $stmt2->execute();
    }
    header('location: ../index.php?page=shoppingcart');

}
else{

    if ($amount == 0) {
        unset($_SESSION['cart'][$_POST['key']]);
    }else{
        $_SESSION['cart'][$_POST['key']]['amount'] = $amount;
    }
}
header('location: ../index.php?page=shoppingcart');