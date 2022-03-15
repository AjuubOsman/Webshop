<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">





<?php
include '../private/connection.php';

$sql = "SELECT category_ID, name FROM categories";
$stmt = $conn->prepare($sql);
$stmt->execute();




if (isset($_SESSION['role'])){
    if($_SESSION['role'] == "klant"){
        while($result = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=product/producten&cat=<?= $result["category_ID"] ?>"><?= $result["name"] ?></a>
            </li>
       <?php } ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=cart">Winkelmandje</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=orders">Mijn bestellingen</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="php/loguit.php">Uitloggen</a>
        </li>
  <?php  }elseif ($_SESSION['role'] == "admin"){ ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=category/categoriebeheer">Categorie Beheer</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=product/productbeheer">Producten</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="php/loguit.php">Uitloggen</a>
        </li>
 <?php   }
}else{
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){ ?>
        <li class="nav-item">
            <a class="nav-link" href="index.php?page=product/producten&cat=<?= $result["category_ID"] ?>"><?= $result["name"] ?></a>
        </li>
    <?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=login">Inloggen</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.php?page=registreer">Registreren</a>
    </li>
<?php }
?>


    </ul>
  </div>
</nav>
