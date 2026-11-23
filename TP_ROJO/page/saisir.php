<?php
require_once '../inc/connection.php';
require_once '../inc/fonction.php';

$id = $_GET['id'] ?? 0;
$stmt = $connexion->prepare("SELECT * FROM salle WHERE id = :id");
$stmt->execute([$id]);
$salle = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$salle) {
    echo "Salle introuvable.";
    exit();
}
$mois = $_GET['mois'] ?? date('n');
$annee = $_GET['annee'] ?? date('Y');

if (isset($_POST['valider'])) {
    $jirama = $_POST['jirama'];
    $solaire = $_POST['solaire'];
    $groupe = $_POST['groupe'];

    $sql = 'INSERT INTO consommation (salle_id, mois, annee, jirama, solaire, groupe)
            VALUES (:salle_id, :mois, :annee, :jirama, :solaire, :groupe)';
    $stmt = $connexion->prepare($sql);
    $stmt->execute([
        $id,
        $mois,
        $annee,
        $jirama,
        $solaire,
        $groupe
    ]);
    header("Location: ../listeConso.php");
    exit();
}

afficherMenu();
afficherTitre("Saisie de consommation pour la salle");
?>
<form method="post">
    <p>Salle : <?php echo $salle['nom']; ?></p>
    <p>Mois : <?php echo $mois; ?></p>
    <p>Année : <?php echo $annee; ?></p>

    <label>Jirama</label>
    <input type="number" name="jirama" id="jirama" required><br>

    <label>Solaire</label>
    <input type="number" name="solaire" id="solaire" required><br>

    <label>Groupe électrogène</label>
    <input type="number" name="groupe" id="groupe" required><br>

    <button type="submit" name="valider">Valider</button>
</form>