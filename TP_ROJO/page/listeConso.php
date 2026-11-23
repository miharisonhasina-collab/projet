<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once 'inc/connection.php';
require_once 'inc/fonction.php';

// afficherMenu();
// afficherTitre("Liste des consommations");

$sql = "SELECT c.id, s.nom AS salle_nom, c.date, c.consommation
        FROM consommation c
        JOIN salle s ON c.salle_id = s.id";
$resultat = $connexion->query($sql);
?>
<table border="1" cellpadding="10">
    <tr>
        <th>Salle</th>
        <th>Mois</th>
        <th>Annee</th>
        <th>Jirama</th>
        <th>Solaire</th>
        <th>Groupe electrogene</th>
    </tr>
    <?php
    while ($conso = $resultat->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td><?php echo $conso['nom']; ?></td>
        <td><?php echo $conso['mois']; ?></td>
        <td><?php echo $conso['annee']; ?></td>
        <td><?php echo $conso['jirama']; ?> KWh</td>
        <td><?php echo $conso['solaire']; ?>KWh</td>
        <td><?php echo $conso['groupe _electrogene']; ?>KWh</td>

    </tr>
    <?php
    }
    ?>
</table>