<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>
<body>
<div class="container">
    <section id="content">
        <form method="post" action="php/registreer.php">
            <h1>Registratie Form</h1>
            <div>
                <input type="text"  name="email" placeholder="email   " required=""/>
            </div>
            <div>
                <input type="password" name="wachtwoord" placeholder="wachtwoord" required=""/>
            </div>
            <div>
                <input type="text"  name="voornaam" placeholder="voornaam" required="" />
            </div>
            <div>
                <input type="text" name="tussenvoegsel" placeholder="tussenvoegsel" required="" />
            </div>
            <div>
                <input type="text" name="achternaam" placeholder="achternaam" required="" />
            </div>
            <div>
                <input type="text" name="woonplaats" placeholder="woonplaats" required="" />
            </div>
            <div>
                <input type="text" name="straat" placeholder="straat" required="" />
            </div>
            <div>
                <input type="text" name="huisnummer" placeholder="huisnummer" required="" />
            </div>
            <div>
                <input type="text" name="postcode" placeholder="postcode" required="" />
            </div>
            <div>
                <input type="date" name="geboortedatum" placeholder="geboort datum" />
            </div>
            <div>
                <input type="submit" value="Al een account" />
            </div>
            <div>
                <input type="submit" value="Log in" />
            </div>


        </form>

    </section>
</div>
</body>
</html>