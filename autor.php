<?php
require_once 'db.php';
$db = conectarDB();

$nombre = $_POST['nombre'];

$sql = "INSERT INTO autores (nombre) VALUES (:nombre)";
$query = $db->prepare($sql);
$query->execute(['nombre' => $nombre]);

echo "Autor guardado correctamente";
?>
