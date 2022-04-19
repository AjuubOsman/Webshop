<?php
//unset($_SESSION['cart']);
include '../Private/connection.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_SESSION['gebruikersid'])) {

$userid =  $_SESSION['gebruikersid'];

$sql = "SELECT u.user_ID, p.product_ID, p.name, p.description, p.price, c.cat_name, c.category_ID, s.amount
                        FROM shoppingcart s
                        LEFT JOIN producten p ON s.product_ID = p.product_ID
                        LEFT JOIN users u ON s.user_ID = u.user_ID
                        LEFT JOIN categories c ON p.category_ID = c.category_ID
                        WHERE s.user_ID = :user_ID  AND s.amount > 0";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':user_ID' , $userid);
$stmt->execute();


$sql2 = "SELECT * FROM users where user_ID = :user_ID";
$stmt2 = $conn->prepare($sql2);
$stmt2->bindParam(':user_ID' , $userid);
$stmt2->execute();
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);

?>
<div class="container mt-3">
    <h2>Bevestig</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Categorie</th>
            <th>product</th>
            <th>Beschrijving</th>
            <th>Prijs</th>
            <th>Aantal</th>
        </tr>
        </thead>
        <tbody>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?= $row["cat_name"] ?></td>
                <td><?= $row["name"] ?></td>
                <td><?= $row["description"] ?></td>
                <td><?= $row["price"]  ?>$</td>
                <td><?= $row["amount"]  ?></td>

            </tr>
        <?php  }?>

        <div class="container">

            <div>
                <input type="text"  name="email" placeholder="email" value="<?= $row2["email"]  ?>" required="" disabled />
            </div>
            <div>
                <input type="password" name="password" placeholder="wachtwoord" value="<?= $row2["password"]  ?>" required="" disabled/>
            </div>
            <div>
                <input type="text"  name="firstname" placeholder="voornaam" value="<?= $row2["firstname"]  ?>" required="" disabled />
            </div>
            <div>
                <input type="text" name="middlename" value="<?= $row2["middlename"]  ?>" placeholder="X " disabled  />
            </div>
            <div>
                <input type="text" name="lastname" value="<?= $row2["lastname"]  ?>" placeholder="achternaam" required="" disabled />
            </div>
            <div>
                <input type="text" name="city" value="<?= $row2["city"]  ?>" placeholder="woonplaats" required="" disabled />
            </div>
            <div>
                <input type="text" name="street" value="<?= $row2["street"]  ?>" placeholder="straat" required="" disabled />
            </div>
            <div>
                <input type="text" name="housenumber" value="<?= $row2["housenumber"]  ?>" placeholder="huisnummer" required="" disabled />
            </div>
            <div>
                <input type="text" name="zipcode" value="<?= $row2["zipcode"]  ?>" placeholder="postcode" required="" disabled />
            </div>
        </div>
        <tr>
            <td>

                <form action="php/order.php" method="post">

                    <button class="btn btn-danger" type="submit"  name="submit">Bestel</button>
                </form>
            </td>
        </tr>
        </tbody>
    </table>

    <?php } else {?>
        <div class="container mt-3">
            <h2>Bevestig</h2>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Categorie</th>
                    <th>product</th>
                    <th>Beschrijving</th>
                    <th>Aantal</th>
                    <th>Prijs per stuk</th>
                    <th>Totaalprijs</th>

                </tr>
                </thead>
                <tbody>
                <?php

                //echo "<pre>", print_r($_SESSION['cart']), "</pre>";
                foreach ( $_SESSION['cart'] as $item ) {
                    $sql3 = "SELECT * FROM producten p LEFT JOIN categories c ON p.category_ID = c.category_ID WHERE product_ID = :id ";
                    $stmt3 = $conn->prepare($sql3);
                    $stmt3->bindParam(':id', $item['id']);
                    $stmt3->execute();
                    $row3 = $stmt3->fetch(PDO::FETCH_ASSOC) ?>
                    <tr>

                        <td><?= $row3["cat_name"] ?></td>
                        <td><?= $row3["name"] ?></td>
                        <td><?= $row3["description"]  ?></td>
                        <td><?= $item["amount"]  ?></td>
                        <td><?= $row3["price"]  ?></td>
                        <td><?= $item["amount"] * $row3["price"] ?>$</td>
                        <td>

                        </td>
                    </tr>
                <?php } ?>
                <div class="container">

                    <div>
                        <input type="text"  name="email" placeholder="email"  required=""/>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="wachtwoord"  required=""/>
                    </div>
                    <div>
                        <input type="text"  name="firstname" placeholder="voornaam"  required="" />
                    </div>
                    <div>
                        <input type="text" name="middlename" placeholder="X "  />
                    </div>
                    <div>
                        <input type="text" name="lastname"  placeholder="achternaam" required="" />
                    </div>
                    <div>
                        <input type="text" name="city"  placeholder="woonplaats" required="" />
                    </div>
                    <div>
                        <input type="text" name="street"  placeholder="straat" required="" />
                    </div>
                    <div>
                        <input type="text" name="housenumber"  placeholder="huisnummer" required="" />
                    </div>
                    <div>
                        <input type="text" name="zipcode"  placeholder="postcode" required="" />
                    </div>
                </div>
                <tr>
                    <td>

                        <form action="php/guestorder.php" method="post">

                            <button class="btn btn-danger" type="submit"  name="submit">Bestel</button>
                        </form>
                    </td>
                </tr>


                </tbody>
            </table>
        </div>
    <?php } ?>

