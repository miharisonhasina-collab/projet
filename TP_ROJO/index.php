<?php
require_once __DIR__ . "/inc/connection.php";
require_once __DIR__ . "/inc/fonction.php";
require_once __DIR__ . "/page/menu.php";
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suivi de la consommation énergétique</title>
</head>
<body>
    <h2>Suivi de la consommation énergétique</h2>
    <p>Bienvenue dans le système de suivi de la consommation
        énergétique des bâtiments du campus universitaire.
    </p>
    <h3>Menu principal</h3>
    <ul>
        <li>
            <a href="page/liste.php">
                Liste des salles
            </a>
        </li>
        <li>
            <a href="page/listeConso.php">
                Liste des consommations
            </a>
        </li>
        <li>
            <a href="page/resultat.php">
                Résultats de la consommation
            </a>
        </li>
    </ul>
</body>
</html>