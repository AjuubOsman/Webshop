<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet"  href="css/style.css">
</head>
<body>
<div class="main">

        <div class="container">
                <form method="post" action="php/registreer.php">
                    <h1>Registratie Form</h1>
                    <div>
                        <input type="text"  name="email" placeholder="email   " required=""/>
                    </div>
                    <div>
                        <input type="password" name="password" placeholder="wachtwoord" required=""/>
                    </div>
                    <div>
                        <input type="text"  name="firstname" placeholder="voornaam" required="" />
                    </div>
                    <div>
                        <input type="text" name="middlename" placeholder="tussenvoegsel"  />
                    </div>
                    <div>
                        <input type="text" name="lastname" placeholder="achternaam" required="" />
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="woonplaats" required="" />
                    </div>
                    <div>
                        <input type="text" name="street" placeholder="straat" required="" />
                    </div>
                    <div>
                        <input type="text" name="housenumber" placeholder="huisnummer" required="" />
                    </div>
                    <div>
                        <input type="text" name="zipcode" placeholder="postcode" required="" />
                    </div>
                    <div>
                        <input type="date" name="dob" placeholder="geboort datum" />
                    </div>
                    <div>
                        <input type="submit" value="Al een account" />
                    </div>
                    <div>
                        <input type="submit" value="Log in" />
                    </div>
                </form>
        </div>
</div>
</body>