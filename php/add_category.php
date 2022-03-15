<?php
include '../../private/connection.php';
$name = $_POST['name'];
$name = $_POST['name'];
$name = $_POST['name'];

$stmt = $conn->prepare("INSERT INTO categories (name)
                        VALUES(:name)");
$stmt->bindParam(':name' , $name);
$stmt->bindParam(':name' , $name);
$stmt->bindParam(':name' , $name);
$stmt->execute();
header('location: ../index.php?page=category/categoriebeheer');
?>

