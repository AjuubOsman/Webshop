<?php
include '../Private/connection.php';
$sql = "SELECT * FROM producten";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<div class="container mt-3">
    <h2>Producten</h2>
    <button class="btn btn-success" onclick="window.location.href='index.php?page=product/insertproduct'">Toevoegen</button>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Naam</th>
            <th>Beschrijving</th>
            <th>Prijs</th>
            <th>Categorie</th>

        </tr>
        </thead>
        <tbody>
        <?php
        if ($stmt->rowCount() > 0){
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?= $row["name"] ?></td>
                    <td><?= $row["description"] ?></td>
                    <td><?= $row["price"]  ?>$</td>


                    <td>
                        <button class="btn btn-warning" onclick="window.location.href='index.php?page=category/updatecategory&prodid=<?= $row["product_ID"] ?>'">Aanpassen</button>
                    </td>
                    <td>
                        <button class="btn btn-danger" name="category_ID" onclick="window.location.href='php/delete_category.php?prodid=<?= $row["product_ID"] ?>'">Verwijderen</button>
                    </td>

                </tr>

            <?php } } ?>


