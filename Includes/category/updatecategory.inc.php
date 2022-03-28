<?php
include '../private/connection.php';

$catID = $_GET['catID'];


$stmt = $conn->prepare("SELECT * FROM categories WHERE category_ID = :catID");
$stmt->bindParam(':catID', $catID, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0){
    $row = $stmt->fetch(PDO::FETCH_ASSOC) ?>
        <div class="container mt-3">
            <h2>Categorienaam aanpassen</h2>
            <form action="php/update_category.php" method="POST">
                <div class="mb-3 mt-3">
                    <label>Naam:</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="cat_name" value="<?=$row["cat_name"] ?>">
                </div>
                <input type="hidden" name="catID" value="<?= $catID ?>">
                <button type="submit" class="btn btn-success">Opslaan</button>
            </form>
        </div>
    <?php } ?>