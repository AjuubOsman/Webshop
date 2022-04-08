<?php
include '../Private/connection.php';

$userid =  $_SESSION['gebruikersid'];

$sql = "SELECT order_ID FROM orders
               WHERE user_ID = :gebruikersid ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':gebruikersid' , $userid);
$stmt->execute();



?>
<div class="container mt-3">
    <h2>Producten</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Datum</th>
            <th> Bestelling</th>


        </tr>
        </thead>
        <tbody>

        <?php if ($stmt->rowCount() > 0){?>

            <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>

                    <td>Order #<?= $row["order_ID"]  ?></td>


                    <td class="text-muted">  <a class="nav-link" onclick="window.location.href='index.php?page=orders&order_ID=<?= $row["order_ID"] ?>'"><button class="btn-black">Bestelling bekijken</button></a></td>


                </tr>

            <?php  } ?>


        <?php }
        ?>


        </tbody>
    </table>