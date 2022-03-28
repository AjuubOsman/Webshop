<?php
include '../../private/connection.php';
$prodid = $_GET['prodid'];

$stmt = $conn->prepare("DELETE FROM shoppingcart WHERE product_ID = :prodid");


$stmt->bindParam(':prodid' , $prodid);
$stmt->execute();
header('location: ../index.php?page=shoppingcart');


?>
