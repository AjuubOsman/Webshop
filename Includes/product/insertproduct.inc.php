<?php
include '../Private/connection.php';
$sql = "SELECT * FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();
?>
<div class="container mt-3">
    <h2>producten toevoegen</h2>
    <form action="php/insert_product.php" method="POST">
        <div class="mb-3 mt-3">
            <label>Naam:</label>
            <input type="text" class="form-control" placeholder="Naam" name="name">
        </div>
        <div class="mb-3 mt-3">
            <label>Beschrijving:</label>
            <input type="text" class="form-control" placeholder="Beschrijving" name="description">
        </div>
        <div class="mb-3 mt-3">

            <label>Prijs:</label>
            <input type="number" class="form-control" placeholder="Prijs" name="price">
            <label>Categorie:</label>
            <select class="form-control"  class="form-select" name="category_ID">
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?= $row["category_ID"] ?>"><?= $row["cat_name"] ?></option>
        <?php }  ?>
            </select>
        </div>

<button type="submit" class="btn btn-success">Toevoegen</button>
</form>
</div>