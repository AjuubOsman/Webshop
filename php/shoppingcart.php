<?php
session_start();
include '../../private/connection.php';

$productid = $_POST['prodid'];
$userid = $_SESSION['gebruikersid'];
$price = $_POST['price'];
$amount = $_POST['amount'];

if (isset($_SESSION['gebruikersid'])) {


    $sql = 'SELECT * FROM shoppingcart where user_ID = :gebruikersid and product_ID = :prodid';
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':gebruikersid', $userid);
    $stmt->bindParam(':prodid', $productid);

    $stmt->execute();

    if ($stmt->rowCount() == 0) {

        $stmt = $conn->prepare("INSERT INTO shoppingcart (user_ID, product_ID,amount, price )
                        VALUES(:gebruikersid, :prodid, :amount, :price)");
        $stmt->bindParam(':gebruikersid', $userid);
        $stmt->bindParam(':prodid', $productid);
        $stmt->bindParam(':amount', $amount);
        $stmt->bindParam(':price', $price);
        $stmt->execute();

        header('location: ../index.php?page=shoppingcart');
    } else {
        $stmt = $conn->prepare("UPDATE shoppingcart SET amount = amount + $amount  where user_ID = :gebruikersid and product_ID = :prodid");
        $stmt->bindParam(':gebruikersid', $userid);
        $stmt->bindParam(':prodid', $productid);
        $stmt->execute();
        header('location: ../index.php?page=shoppingcart');
    }
}else {
    $new = true;
    //unset($_SESSION['cart']);
    $product = array (
     "id" => $productid, "amount" => $amount, "price" => $price

    );

   //echo "<pre>", print_r($_SESSION['cart']), "</pre>";
    //    unset($_SESSION['cart']);
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }
foreach ($_SESSION['cart'] as $key => $item){
    if($item['id'] == $productid){
        $_SESSION['cart'][$key]['amount'] += $amount;
        $new = false;
    }
}
if($new){
    $_SESSION['cart'][] = $product;
}

    //echo "<pre>", print_r($_SESSION['cart']), "</pre>";
}
header('location: ../index.php?page=shoppingcart');