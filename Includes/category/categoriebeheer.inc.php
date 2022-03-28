<?php
include '../private/connection.php';

$sql = "SELECT category_ID, cat_name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<div class="container mt-3">
    <h2>Categorieën</h2>
    <button class="btn btn-success" onclick="window.location.href='index.php?page=category/insertcategory'">Toevoegen</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Naam</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($stmt->rowCount() > 0){
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                        <tr>
                            <td><?= $row["cat_name"] ?></td>
                            <td>
                                <button class="btn btn-warning" onclick="window.location.href='index.php?page=category/updatecategory&catID=<?= $row["category_ID"] ?>'">Aanpassen</button>
                            </td>
                            <td>
                                <button class="btn btn-danger" name="category_ID" onclick="window.location.href='php/delete_category.php?catID=<?= $row["category_ID"] ?>'">Verwijderen</button>
                            </td>

                        </tr>

           <?php } } ?>


