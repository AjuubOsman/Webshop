<?php
include '../../private/connection.php';




    $cat_name = $_POST['cat_name'];
    $catID = $_POST['catID'];
    $stmt = $conn->prepare("UPDATE categories SET `cat_name` = :cat_name WHERE `category_ID` = :catID");

    $stmt->bindParam(':cat_name', $cat_name, PDO::PARAM_STR);
    $stmt->bindParam(':catID', $catID, PDO::PARAM_STR);

    $stmt->execute();


header('location: ../index.php?page=category/categoriebeheer');



?>
