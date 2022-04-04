<?php
include '../Private/connection.php';

$product_ID = $_GET['prodid'];

$sql = "SELECT p.product_ID, p.name, p.description, p.price, c.cat_name, p.category_ID 
        FROM producten p 
        INNER JOIN categories c ON p.category_ID = c.category_ID
        WHERE product_ID = :prodID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':prodID', $product_ID, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$sql2 = "SELECT * FROM categories";
$stmt2 = $conn->prepare($sql2);
$stmt2->execute();
?>


<div class="container mt-3">
    <h2>Producten aanpassen</h2>
    <form action="php/update_product.php" method="POST">
        <div class="mb-3 mt-3">
            <label>Naam:</label>
            <input type="text" class="form-control" placeholder="Naam" name="name" value="<?= $row['name'] ?>">
        </div>
        <div class="mb-3 mt-3">
            <label>Beschrijving:</label>
            <input type="text" class="form-control" placeholder="Beschrijving" name="description" value="<?= $row['description'] ?>">
        </div>
        <div class="mb-3 mt-3">

            <label>Prijs:</label>
            <input type="number" class="form-control" placeholder="Prijs" name="price" value="<?= $row['price'] ?>">
            <label>Categorie:</label>

            <select class="form-control"  class="form-select" name="catid">
                <option value="<?= $row["category_ID"] ?>"><?= $row["cat_name"] ?></option>
                <?php while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) {
                    if($row2["category_ID"] != $row["category_ID"]){ ?>
                        <option  value="<?= $row2["category_ID"] ?>"><?= $row2["cat_name"] ?></option>
                    <?php } }  ?>
            </select>
        </div>
        <input type="hidden" name="prodid" value="<?= $row['product_ID'] ?>">
        <button type="submit" name="update" class="btn btn-success">Opslaan</button>
    </form>
</div>