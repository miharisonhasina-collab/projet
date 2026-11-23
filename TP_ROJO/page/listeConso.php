<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once __DIR__ . '/../inc/connection.php';
require_once __DIR__ . '/../inc/fonction.php';

afficherMenu();
afficherTitre("Liste des consommations");

$sql = "SELECT c.id, s.nom AS salle_nom, c.mois, c.annee,
               c.jirama, c.solaire, c.groupe
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
        <th>Actions</th>
    </tr>
    <?php
    while ($conso = $resultat->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td><?php echo htmlspecialchars($conso['salle_nom'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars((string) $conso['mois'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars((string) $conso['annee'], ENT_QUOTES, 'UTF-8'); ?></td>
        <td><?php echo htmlspecialchars((string) $conso['jirama'], ENT_QUOTES, 'UTF-8'); ?> KWh</td>
        <td><?php echo htmlspecialchars((string) $conso['solaire'], ENT_QUOTES, 'UTF-8'); ?> KWh</td>
        <td><?php echo htmlspecialchars((string) $conso['groupe'], ENT_QUOTES, 'UTF-8'); ?> KWh</td>
        <td>
            <a href="modifie.php?id=<?php echo (int) $conso['id']; ?>">Modifier</a>
            |
            <a href="supprimer.php?id=<?php echo (int) $conso['id']; ?>"
               onclick="return confirm('Supprimer cette consommation ?');">Supprimer</a>
        </td>

    </tr>
    <?php
    }
    ?>
</table>