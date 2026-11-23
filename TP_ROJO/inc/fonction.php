<?php
function afficherTitre($titre) {
    echo "<h2>" . htmlspecialchars($titre, ENT_QUOTES, 'UTF-8') . "</h2>";
}

function afficherMessage($message) {
    echo "<p>" . htmlspecialchars($message, ENT_QUOTES, 'UTF-8') . "</p>";
}

function afficherMenu() {
    $chemin = __DIR__ . "/../page/menu.php";
    require $chemin;
}
?>