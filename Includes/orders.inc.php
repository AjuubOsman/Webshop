<?php
include '../Private/connection.php';

$userid =  $_SESSION['gebruikersid'];

$sql = "SELECT u.user_ID, p.product_ID, p.name, p.description, p.price, c.cat_name, c.category_ID, s.amount
        FROM shoppingcart s
        LEFT JOIN producten p ON s.product_ID = p.product_ID
        LEFT JOIN users u ON s.user_ID = u.user_ID
        LEFT JOIN categories c ON p.category_ID = c.category_ID
        WHERE s.user_ID = :user_ID AND s.amount > 0";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_ID' , $userid);
$stmt->execute();

?>

<div class="container mt-3">
    <h2>Winkelmand</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Categorie</th>
            <th>product</th>
            <th>Beschrijving</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>Bestellen</th>


        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row["cat_name"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["description"] ?></td>
                <td><?= $row["price"]  ?>$</td>


                <td>

                    <form action="php/edit_shoppingcart.php" method="post">

                        <input type="text" name="amount" value="<?= $row["amount"]  ?>" min="0" required>
                        <input type="hidden" name="prodid" value="<?= $row["product_ID"] ?>">
                        <button class="btn btn-danger" type="submit" name="submit">Opslaan</button>

                    </form>
                </td>






            </tr>
        <?php  }
        if ($stmt ->rowCount() > 0){?>

            <tr>
                <td>
                    <form action="php/order.php" method="post">
                        <button class="btn btn-danger" type="submit" name="submit">Bestel</button>
                    </form>
                </td>

            </tr>
        <?php }?>





        </tbody>
    </table>
