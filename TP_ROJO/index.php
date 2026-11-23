<?php

require_once "inc/connection.php";
require_once "inc/fonction.php";
require_once "page/menu.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Suivi de la consommation eneregetique</h2>
    <p>Bienvenue dans le susteme de suivi de la consommation
        energetique des batiments du campus universitaire.
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
            <a href="resultat.php">
                Resultat de la consommation
            </a>
        </li>
    </ul>
</body>
</html>