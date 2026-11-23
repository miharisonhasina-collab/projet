<?php
require_once __DIR__ . '/../inc/connection.php';
require_once __DIR__ . '/../inc/fonction.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$id = $id !== false ? $id : 0;
$stmt = $connexion->prepare(
    "SELECT * FROM consommation WHERE id = ?"
);
$stmt->execute([$id]);
$conso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$conso) {
    echo "Consommation introuvable.";
    exit();
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $jirama = filter_input(INPUT_POST, 'jirama', FILTER_VALIDATE_FLOAT);
    $solaire = filter_input(INPUT_POST, 'solaire', FILTER_VALIDATE_FLOAT);
    $groupe = filter_input(INPUT_POST, 'groupe', FILTER_VALIDATE_FLOAT);

    if ($jirama === false || $solaire === false || $groupe === false
        || $jirama < 0 || $solaire < 0 || $groupe < 0) {
        afficherMessage("Toutes les consommations doivent être des nombres positifs.");
    } else {
        $sql = "UPDATE consommation SET jirama = ?, solaire = ?, groupe = ? WHERE id = ?";
        $stmt = $connexion->prepare($sql);
        $stmt->execute([$jirama, $solaire, $groupe, $id]);

        header("Location: listeConso.php");
        exit();
    }
}
?>
<?php afficherMenu(); ?>
<h2>Modifier la consommation</h2>
<form method="post">
    <label>Jirama</label>
    <input type="number" name="jirama" value="<?php echo $conso['jirama']; ?>" required><br>

    <label>Solaire</label>
    <input type="number" name="solaire" value="<?php echo $conso['solaire']; ?>" required><br>

    <label>Groupe électrogène</label>
    <input type="number" name="groupe" value="<?php echo $conso['groupe']; ?>" required><br>

    <button type="submit" name="modifier">Modifier</button>
</form>