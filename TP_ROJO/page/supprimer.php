<?php
require_once "../connection.php";

$id = $_GET['id'];
$stmt = $connexion->prepare("DELETE FROM consommation WHERE id = ?");
$stmt->execute([$id]);

header("Location: ../listeConso.php");
exit();
?>