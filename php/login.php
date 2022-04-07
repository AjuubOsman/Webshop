<?php
session_start();

include '../../private/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT role, user_ID FROM users WHERE email= :email AND password = :password";

$query = $conn->prepare($sql);
$query->bindParam(':email', $email);
$query->bindParam(':password', $password);
$query->execute();


if ($query->rowCount() == 1 ) {
    $result = $query->fetch(PDO::FETCH_ASSOC);
    if ($result['role'] == "klant") {
        $_SESSION['role'] = "klant";
        $_SESSION['gebruikersid'] = $result['user_ID'];
        header('location: ../index.php?page=shoppingcart');
    } elseif ($result['role'] == "admin") {
        $_SESSION['role'] = "admin";
        $_SESSION['gebruikersid'] = $result['user_ID'];
        header('location: ../index.php?page=category/categoriebeheer');
    }
    else
    {
        $_SESSION['gast'] = $result['gast'];
    }
}else{

    $_SESSION['melding'] = 'Combinatie gebruikersnaam en Wachtwoord onjuist.';
    header('location: ../index.php?page=login');
}




?>
