<?php
require_once 'db.php';
$db = conectarDB();

$sql = "SELECT id_autor, nombre FROM autores";
$stmt = $db->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>