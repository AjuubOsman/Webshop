<?php
include '../../private/connection.php';

$email = $_POST['email'];
$Wachtwoord = $_POST['wachtwoord'];
$Voornaam = $_POST['voornaam'];
$Tussenvoegsel = $_POST['tussenvoegsel'];
$Achternaam = $_POST['achternaam'];
$Woonplaats = $_POST['woonplaats'];
$Straat = $_POST['straat'];
$Huisnummer = $_POST['huisnummer'];
$Postcode = $_POST['postcode'];
$Geboortedatum = $_POST['geboortedatum'];


$stmt = $conn->prepare("INSERT INTO gebruikers (email,wachtwoord,Voornaam, Tussenvoegsel, Achternaam,Woonplaats,straat,Huisnummer,Postcode,geboortedatum)
                                                   values(:email,:wachtwoord,:voornaam, :tussenvoegsel, :achternaam, :woonplaats,:straat,:huisnummer,:postcode,:geboortedatum)");



$stmt->bindParam(':voornaam' , $Voornaam);
$stmt->bindParam(':tussenvoegsel' , $Tussenvoegsel);
$stmt->bindParam(':achternaam' , $Achternaam);
$stmt->bindParam(':woonplaats' , $Woonplaats);
$stmt->bindParam(':straat' , $Straat);
$stmt->bindParam(':huisnummer' , $Huisnummer);
$stmt->bindParam(':postcode' , $Postcode);
$stmt->bindParam(':wachtwoord' , $Wachtwoord);
$stmt->bindParam(':geboortedatum' , $Geboortedatum);
$stmt->bindParam(':email' , $email);



$stmt->execute();
header('location: ../index.php?page=login');




?>
