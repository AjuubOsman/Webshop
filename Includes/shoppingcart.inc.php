<?php
include '../Private/connection.php';

$userid =  $_SESSION['gebruikersid'];

$sql = "SELECT u.user_ID, p.product_ID, p.name, p.description, p.price, c.cat_name, c.category_ID, s.amount
        FROM shoppingcart s
        LEFT JOIN producten p ON s.product_ID = p.product_ID
        LEFT JOIN users u ON s.user_ID = u.user_ID
        LEFT JOIN categories c ON p.category_ID = c.category_ID
        WHERE s.user_ID = :user_ID";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_ID' , $userid);
$stmt->execute();

?>

<div class="container mt-3">
    <h2>Producten</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Categorie</th>
            <th>product</th>
            <th>Beschrijving</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Terug brengen</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row["cat_name"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["description"] ?></td>
                <td><?= $row["price"]  ?>$</td>
                <td><?= $row["amount"]  ?>
                <td>
                    <button class="btn btn-danger" name="prodid" onclick="window.location.href='php/remove_shoppingcart.php?prodid=<?= $row["product_ID"] ?>'">Verwijderen</button>
                </td>





            </tr>
        <?php  } ?>
        </tbody>
    </table>
