<?php
include '../../private/connection.php';
$sql = ("SELECT order_ID from orders");
$stmt = $conn->prepare($sql);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_POST['submit']) {

    $product_ID = $_POST['prodid'];



    foreach ($product_ID as $key => $value) {

        $grades = implode(',', $product_ID);

        $query = "INSERT INTO producten_orders (order_ID, product_ID, amount)
                            VALUES(:order_ID,$grades)";
        $stmt->bindParam(':order_ID',  $row["order_ID"]);
        $stmt->execute();
    }
}var_dump($value);



//$stmt = $conn->prepare("SELECT *  FROM shoppingcart where user_ID = :gebruikersid");
//$stmt ->bindParam(':gebruikersid' , $userid);
//$stmt->execute();
//$result = $stmt->fetchAll();
//
//$stmt = $conn->prepare("INSERT INTO producten_orders (order_ID, product_ID, amount)
//                            VALUES(:order_ID,:prodid, :amount)");
//$stmt->bindParam(':order_ID',  $row["order_ID"]);
//$stmt->bindParam(':prodid', product_ID);
//$stmt->bindParam(':amount', $amount);
//
//$stmt->execute();

?>