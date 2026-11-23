<?php
require_once "../connection.php";

$id = $_GET['id'];
$stmt = $connexion->prepare(
    "SELECT * FROM consommation WHERE id = ?"
);
$stmt->execute([$id]);
$conso = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$conso) {
    echo "Consommation introuvable.";
    exit();
}
if (isset($_POST['modifier'])) {
    $jirama = $_POST['jirama'];
    $solaire = $_POST['solaire'];
    $groupe = $_POST['groupe'];

    $sql = "UPDATE consommation SET jirama = ?, solaire = ?, groupe = ? WHERE id = ?";
    $stmt = $connexion->prepare($sql);
    $stmt->execute([$jirama, $solaire, $groupe, $id]);

    header("Location: ../listeConso.php");
    exit();
}
?>
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