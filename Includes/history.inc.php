<?php
//unset($_SESSION['cart']);
include '../Private/connection.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['gebruikersid'])) {

$userid =  $_SESSION['gebruikersid'];


$sql = "SELECT order_ID FROM orders
               WHERE user_ID = :gebruikersid ";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':gebruikersid' , $userid);
$stmt->execute();




?>

<div class="container mt-3">
    <h2>Bestel Geschiedenis</h2>

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
    <?php } else {

    $sql2 = "SELECT order_ID FROM orders
    WHERE user_ID IS NULL ";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->execute();

    $sql4 = "SELECT order_ID FROM orders
    WHERE user_ID IS NULL ";
    $stmt4 = $conn->prepare($sql4);
    $stmt4->execute();




    ?>

    <div class="container mt-3">
        <h2>Bestel Geschiedenis</h2>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>Datum</th>
                <th> Bestelling</th>


            </tr>
            </thead>
            <tbody>



                <?php while ($row2 = $stmt2->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>

                        <td>Order #<?= $row2["order_ID"]  ?></td>


                        <td class="text-muted">  <a class="nav-link" onclick="window.location.href='index.php?page=orders&order_ID2=<?= $row2["order_ID"] ?>'"><button class="btn-black">Bestelling bekijken</button></a></td>


                    </tr>

                <?php  }?>
            </tbody>
        </table>
    <?php } ?>

