<?php
include '../../private/connection.php';




    $name = $_POST['name'];
    $catID = $_POST['catID'];
    $stmt = $conn->prepare("UPDATE categories SET `name` = :name WHERE `category_ID` = :catID");

    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':catID', $catID, PDO::PARAM_STR);

    $stmt->execute();


header('location: ../index.php?page=category/categoriebeheer');



?>
