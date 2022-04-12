<?php
include '../Private/connection.php';

$sql = "SELECT p.product_ID, p.name, p.description, p.price, c.cat_name, p.category_ID, p.status 
        FROM producten p
        LEFT JOIN categories c ON p.category_ID = c.category_ID
        WHERE status = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<div class="container mt-3">
    <h2>Producten</h2>
    <button class="btn btn-success" onclick="window.location.href='index.php?page=product/insertproduct'">Toevoegen</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Categorie</th>
                <th>product</th>
                <th>Beschrijving</th>
                <th>Prijs</th>

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
                        <button class="btn btn-warning" onclick="window.location.href='index.php?page=product/updateproduct&prodid=<?= $row["product_ID"] ?>'">Aanpassen</button>
                    </td>
                    <td>
                        <button class="btn btn-danger" name="prodid" onclick="window.location.href='php/delete_product.php?prodid=<?= $row["product_ID"] ?>'">Verwijderen</button>
                    </td>

                </tr>

            <?php  } ?>
        </tbody>
    </table>


