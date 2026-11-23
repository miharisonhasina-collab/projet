<?php
require_once __DIR__ . '/../inc/connection.php';
require_once __DIR__ . '/../inc/fonction.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$id = $id !== false ? $id : 0;
$stmt = $connexion->prepare("SELECT * FROM salle WHERE id = :id");
$stmt->execute(['id' => $id]);
$salle = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$salle) {
    echo "Salle introuvable.";
    exit();
}
$mois = $_GET['mois'] ?? date('n');
$annee = $_GET['annee'] ?? date('Y');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jirama = filter_input(INPUT_POST, 'jirama', FILTER_VALIDATE_FLOAT);
    $solaire = filter_input(INPUT_POST, 'solaire', FILTER_VALIDATE_FLOAT);
    $groupe = filter_input(INPUT_POST, 'groupe', FILTER_VALIDATE_FLOAT);

    if ($jirama === false || $solaire === false || $groupe === false
        || $jirama < 0 || $solaire < 0 || $groupe < 0) {
        afficherTitre("Saisie de consommation pour la salle");
        afficherMessage("Toutes les consommations doivent être des nombres positifs.");
    } else {
        $sql = 'INSERT INTO consommation (salle_id, mois, annee, jirama, solaire, groupe)
                VALUES (:salle_id, :mois, :annee, :jirama, :solaire, :groupe)';
        $stmt = $connexion->prepare($sql);
        $stmt->execute([
            'salle_id' => $id,
            'mois' => $mois,
            'annee' => $annee,
            'jirama' => $jirama,
            'solaire' => $solaire,
            'groupe' => $groupe
        ]);
        header("Location: listeConso.php");
        exit();
    }
}

afficherMenu();
afficherTitre("Saisie de consommation pour la salle");
?>
<form method="post">
    <p>Salle : <?php echo htmlspecialchars($salle['nom'], ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Mois : <?php echo htmlspecialchars((string) $mois, ENT_QUOTES, 'UTF-8'); ?></p>
    <p>Année : <?php echo htmlspecialchars((string) $annee, ENT_QUOTES, 'UTF-8'); ?></p>

    <label>Jirama</label>
    <input type="number" name="jirama" id="jirama" min="0" step="0.01" required><br>

    <label>Solaire</label>
    <input type="number" name="solaire" id="solaire" min="0" step="0.01" required><br>

    <label>Groupe électrogène</label>
    <input type="number" name="groupe" id="groupe" min="0" step="0.01" required><br>

    <button type="submit" name="valider">Valider</button>
</form>