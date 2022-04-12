<?php
//unset($_SESSION['cart']);
include '../Private/connection.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['gebruikersid'])) {

$order_ID =  $_GET['order_ID'];
$userid =  $_SESSION['gebruikersid'];

$sql = "SELECT p.product_ID, p.name, p.description, po.amount, o.date , o.user_ID, po.order_ID, po.price
FROM  producten p
INNER JOIN producten_orders po on po.product_ID = p.product_ID
INNER JOIN orders o ON po.order_ID = o.order_ID
WHERE  po.order_ID = :order_ID ";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':order_ID' , $order_ID);
$stmt->execute();

$sql2 = "SELECT SUM(po.price * po.amount) as totalprice from producten_orders po
LEFT JOIN producten p ON po.product_ID = p.product_ID
INNER JOIN orders o ON po.order_ID = o.order_ID
INNER JOIN users u ON o.user_ID = u.user_ID
WHERE u.user_ID = :userid and  po.order_ID = :order_ID";

$stmt2 = $conn->prepare($sql2);
$stmt2->bindParam(':userid', $userid, PDO::PARAM_INT);
$stmt2->bindParam(':order_ID' , $order_ID);
$stmt2->execute();

?>

<div class="container mt-3">
    <h2>Winkelmand</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Datum</th>
            <th>Product</th>
            <th>Beschrijving</th>
            <th>Aantal</th>
            <th>Prijs</th>




        </tr>
        </thead>
        <tbody>
        <?php  ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC))  ?>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row["date"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["description"] ?></td>
                <td><?= $row["amount"] ?></td>
                <td><?= $row["price"] ?></td>









            </tr>
        <?php  }
        ?>
        <th>Totaal</th>
        <tr>
            <td><?= $row2["totalprice"]  ?>$</td>
        </tr>

        </tbody>
    </table>
    <?php } else {
    $order_ID2 =  $_GET['order_ID2'];


    $sql2 = "SELECT p.product_ID, p.name, p.description, po.amount, o.date , o.user_ID, po.order_ID, po.price
FROM  producten p
INNER JOIN producten_orders po on po.product_ID = p.product_ID
INNER JOIN orders o ON po.order_ID = o.order_ID
WHERE  po.order_ID = :order_ID2 ";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':order_ID2', $order_ID2);
    $stmt2->execute();



    ?>

    <div class="container mt-3">
        <h2>Winkelmand</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Datum</th>
                <th>Product</th>
                <th>Beschrijving</th>
                <th>Aantal</th>
                <th>Prijs</th>




            </tr>
            </thead>
            <tbody>

            <?php while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row2["date"] ?></td>
                    <td><?= $row2["name"] ?></td>
                    <td><?= $row2["description"] ?></td>
                    <td><?= $row2["amount"] ?></td>
                    <td><?= $row2["amount"] * $row2["price"] ?>$</td>









                </tr>
            <?php  }
            ?>


            </tbody>
        </table>
        <?php } ?>

