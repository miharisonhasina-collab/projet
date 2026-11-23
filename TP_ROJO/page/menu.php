<?php
$dansPage = str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/page/');
$prefixe = $dansPage ? '' : 'page/';
$accueil = $dansPage ? '../index.php' : 'index.php';
?>
<nav>
    <a href="<?php echo $accueil; ?>">Accueil</a>
    <a href="<?php echo $prefixe; ?>liste.php">Liste des salles</a>
    <a href="<?php echo $prefixe; ?>listeConso.php">Liste des consommations</a>
    <a href="<?php echo $prefixe; ?>resultat.php">Résultats</a>
</nav>
<hr>