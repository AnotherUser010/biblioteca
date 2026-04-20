<?php
require_once 'db.php';
$db = conectarDB();

$sql = "SELECT id_usuario, nombre FROM usuarios";
$stmt = $db->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>