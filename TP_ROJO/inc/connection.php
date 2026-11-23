<?php
$host = "localhost";
$dbname = "energie";
$user = "root";
$password = "";

try {
    $connexion = new PDO(
        "mysql:host=$host;dbname=$dbname", 
        $user, 
        $password);
    $connexion->setAttribute(
        PDO::ATTR_ERRMODE, 
        PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion à la base de données : " . $e->getMessage();
    exit();
}
?>