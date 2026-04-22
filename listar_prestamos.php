<?php
require_once 'db.php';
$db = conectarDB();

header('Content-Type: application/json');

$sql = "SELECT 
            u.nombre, 
            l.titulo, 
            p.fecha
        FROM prestamos p
        LEFT JOIN usuarios u ON p.id_usuario = u.id_usuario
        LEFT JOIN libros l ON p.id_libro = l.id_libro
        ORDER BY p.fecha DESC";

$stmt = $db->query($sql);

echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
?>