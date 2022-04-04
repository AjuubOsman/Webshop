<?php
include '../../private/connection.php';

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $prodid = $_POST['prodid'];
    $catid = $_POST['catid'];

    $stmt = $conn->prepare("UPDATE producten SET name = :name, description = :description, price = :price, category_ID = :catid  WHERE product_ID = :prodid");

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':description', $description, PDO::PARAM_STR);
    $stmt->bindParam(':price', $price, PDO::PARAM_STR);
    $stmt->bindParam(':prodid', $prodid, PDO::PARAM_INT);
    $stmt->bindParam(':catid',$catid, PDO::PARAM_INT);

    $stmt->execute();
    header('location: ../index.php?page=product/productbeheer');

?>
