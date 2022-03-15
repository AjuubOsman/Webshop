<?php
include '../../private/connection.php';

$email = $_POST['email'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$lastname = $_POST['lastname'];
$city = $_POST['city'];
$street = $_POST['street'];
$housenumber = $_POST['housenumber'];
$zipcode = $_POST['zipcode'];
$dob = $_POST['dob'];
$role = "klant";

$stmt = $conn->prepare("INSERT INTO users (email,password,firstname, middlename, lastname,city,street,housenumber,zipcode,dob, role)
                                                   values(:email,:password,:firstname, :middlename, :lastname, :city,:street,:housenumber,:zipcode,:dob, :role)");



$stmt->bindParam(':firstname' , $firstname);
$stmt->bindParam(':middlename' , $middlename);
$stmt->bindParam(':lastname' , $lastname);
$stmt->bindParam(':city' , $city);
$stmt->bindParam(':street' , $street);
$stmt->bindParam(':housenumber' , $housenumber);
$stmt->bindParam(':zipcode' , $zipcode);
$stmt->bindParam(':password' , $password);
$stmt->bindParam(':dob' , $dob);
$stmt->bindParam(':email' , $email);
$stmt->bindParam(':role' , $role);



$stmt->execute();
header('location: ../index.php?page=login');




?>
