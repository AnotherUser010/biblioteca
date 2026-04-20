<?php
require_once 'db.php';
$db = conectarDB();

$sql = "SELECT id_libro, titulo FROM libros";
$stmt = $db->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>