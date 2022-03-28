<?php
include '../../private/connection.php';
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];
$category_ID = $_POST['category_ID'];

$stmt = $conn->prepare("INSERT INTO producten  (name, description, price, category_ID)
                        VALUES(:name, :description, :price, :category_ID)");
$stmt->bindParam(':name' , $name);
$stmt->bindParam(':description' , $description);
$stmt->bindParam(':price' , $price);
$stmt->bindParam(':category_ID' , $category_ID);

$stmt->execute();
header('location: ../index.php?page=product/productbeheer');
?>