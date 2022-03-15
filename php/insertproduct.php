<?php
include '../../private/connection.php';
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$stmt = $conn->prepare("INSERT INTO producten  (name, description, price)
                        VALUES(:name, :description, :price)");
$stmt->bindParam(':name' , $name);
$stmt->bindParam(':description' , $description);
$stmt->bindParam(':price' , $price);

$stmt->execute();
header('location: ../index.php?page=product/productbeheer');
?>