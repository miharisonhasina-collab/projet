<?php
require_once __DIR__ . '/../inc/connection.php';

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$id = $id !== false ? $id : 0;
$stmt = $connexion->prepare("DELETE FROM consommation WHERE id = ?");
$stmt->execute([$id]);

header("Location: listeConso.php");
exit();
?>