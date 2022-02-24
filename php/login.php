<?php
session_start();

include '../../private/connection.php';

$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];

$sql = 'SELECT rol, gebruikersid FROM gebruikers WHERE email= :email AND wachtwoord = :wachtwoord';

$query = $conn->prepare($sql);
$query->bindParam(':email', $email);
$query->bindParam(':wachtwoord', $wachtwoord);
$query->execute();


if ($query->rowCount() == 1 ) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result['rol'] == "") {
        $_SESSION['ingelogd'] = true;
        $_SESSION['gebruikersid'] = $result['gebruikersid'];
        header('location: ../index.php?page=hoofdpagina');
    } elseif ($result['rol'] == "admin") {
        $_SESSION['ingelogd1'] = true;
        $_SESSION['gebruikersid'] = $result['gebruikersid'];
        header('location: ../index.php?page=hoofdpagina');
    }
}else{

    $_SESSION['melding'] = 'Combinatie gebruikersnaam en Wachtwoord onjuist.';
    header('location: ../index.php?page=login');
}




?>
