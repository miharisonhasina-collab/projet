<?php
require_once "inc/connection.php";
require_once "inc/fonction.php";

// afficherMenu();
// afficherTitre("Resultat des consommation");

$sql = "SELECT
salles.id,
salles.nom,
COALESCE(SUM(consommation.jirama), 0) AS total_jirama,
COALESCE(SUM(consommation.solaire), 0) AS total_solaire,
COALESCE(SUM(consommation.groupe_electrogene), 0) AS groupe
FROM salles
LEFT JOIN consommation ON salles.id = consommation.salle_id
GROUP BY salles.id, salles.nom
ORDER BY salles.id";

$resultat = $connexion->query($sql);
?>

<table border="1" cellpadding="8">
        <tr>
            <th>Salle</th>
            <th>Jirama</th>
            <th>Solaire</th>
            <th>Groupe Electrogène</th>
            <th>Total</th>
        </tr>
        <?php
        while ($ligne = $resultat->fetch(PDO::FETCH_ASSOC)) {
            $total = $ligne['total_jirama'] 
                   + $ligne['total_solaire'] 
                   + $ligne['groupe'];
        ?>
        <tr>
            <td><?php echo $ligne['nom']; ?></td>
            <td><?php echo $ligne['total_jirama']; ?></td>
            <td><?php echo $ligne['total_solaire']; ?></td>
            <td><?php echo $ligne['groupe']; ?></td>
            <td><?php echo $total; ?></td>
            <td><?php echo $total; ?>KWh</td>
        </tr>
        <?php
        }
        ?>
</table>