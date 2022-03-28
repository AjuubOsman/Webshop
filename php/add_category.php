<?php
include '../../private/connection.php';
$cat_name = $_POST['cat_name'];
$stmt = $conn->prepare("INSERT INTO categories (cat_name)
                        VALUES(:cat_name)");
$stmt->bindParam(':cat_name' , $cat_name);
$stmt->execute();
header('location: ../index.php?page=category/categoriebeheer');
?>

