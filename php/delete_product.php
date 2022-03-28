<?php
include '../../private/connection.php';


    $prodid = $_GET['prodid'];
    $stmt = $conn->prepare("UPDATE producten SET status = 0 where product_ID = :prodid");
    $stmt->bindParam(':prodid' , $prodid);
    $stmt->execute();
    header('location: ../index.php?page=product/productbeheer');




?>








