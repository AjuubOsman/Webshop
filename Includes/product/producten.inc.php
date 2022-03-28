
<?php
include '../Private/connection.php';

$cat = $_GET['cat'];

$sql = "SELECT p.product_ID, p.name, p.description, p.price,p.amount, c.cat_name, p.category_ID, p.status 
        FROM producten p
        LEFT JOIN categories c ON p.category_ID = c.category_ID
        WHERE c.category_ID = $cat AND status = 1";
$stmt = $conn->prepare($sql);
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
            <th>Acties</th>

        </tr>
        </thead>
        <tbody>

        <?php if ($stmt->rowCount() > 0){?>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row["cat_name"] ?></td>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td><?= $row["price"]  ?>$</td>


                    <td>
                        <button class="btn btn-danger" name="prodid" onclick="window.location.href='php/shoppingcart.php?prodid=<?= $row["product_ID"] ?>'">Toevoegen Aan Winkelmandje</button>

                    </td>


                </tr>

            <?php  } ?>


        <?php }
        else
        {?>
            <td><?='Artikelen zijn uitverkocht'?></td>


        <?php }?>


        </tbody>
    </table>



