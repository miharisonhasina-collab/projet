<?php
require_once __DIR__ . '/../inc/connection.php';
require_once __DIR__ . '/../inc/fonction.php';

afficherMenu();
afficherTitre("Résultats des consommations");

$sql = "SELECT
salle.id,
salle.nom,
COALESCE(SUM(consommation.jirama), 0) AS total_jirama,
COALESCE(SUM(consommation.solaire), 0) AS total_solaire,
COALESCE(SUM(consommation.groupe), 0) AS total_groupe
FROM salle
LEFT JOIN consommation ON salle.id = consommation.salle_id
GROUP BY salle.id, salle.nom
ORDER BY salle.id";

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
                   + $ligne['total_groupe'];
        ?>
        <tr>
            <td><?php echo $ligne['nom']; ?></td>
            <td><?php echo $ligne['total_jirama']; ?></td>
            <td><?php echo $ligne['total_solaire']; ?></td>
            <td><?php echo $ligne['total_groupe']; ?> KWh</td>
            <td><?php echo $total; ?> KWh</td>
        </tr>
        <?php
        }
        ?>
</table>