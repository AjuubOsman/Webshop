<?php
session_start();
include '../../private/connection.php';

$order_ID = $_POST['order_ID'];





$stmt = $conn->prepare("SELECT * FROM orders WHERE order_ID = :order_ID");
$stmt->bindParam(':order_ID', $order_ID);

$stmt->execute();

$searchorder = $stmt->fetch(PDO::FETCH_ASSOC);

echo $searchorder['order_ID']



?>