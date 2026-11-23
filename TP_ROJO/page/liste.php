<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../inc/connection.php";
require_once "../inc/fonction.php";



// afficherMenu();
// afficherTitre("Liste des salles");
?>

<table border="1" cellpadding="10">
    <tr>
        <th>Numero</th>
        <th>Nom de la salle</th>
        <th>Action</th>
    </tr> 

    <?php
    $sql = "SELECT * FROM salle";
    $resultat = $connexion->query($sql);
    while ($salle = $resultat->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <tr>
        <td><?php echo $salle['id']; ?></td>
        <td><?php echo $salle['nom']; ?></td>
        <td>
            <a href="saisir.php?id=<?php echo $salle['id']; ?>">Saisir</a>
        </td>
    </tr>

    <?php
    }
    ?>
</table>