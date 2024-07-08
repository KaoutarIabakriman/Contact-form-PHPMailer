<?php
$host="localhost";
$user="root";
$password="";
$database="register";
$port = 3306;
// Tentative de connexion à la base de données MySQL avec le numéro de port spécifié
$conn = mysqli_connect($host, $user, $password, $database, $port);

if (!$conn) {
    // La connexion a échoué, affiche un message d'erreur et arrête le script
    die("Connection failed: " . mysqli_connect_error());
}
?>