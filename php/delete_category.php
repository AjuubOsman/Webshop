<?php
include '../../private/connection.php';




$catID = $_GET['catID'];

$stmt = $conn->prepare("DELETE FROM categories WHERE category_ID = :catID");

$stmt->bindParam(':catID', $catID, PDO::PARAM_INT);

$stmt->execute();
header('location: ../index.php?page=category/categoriebeheer');




?>
