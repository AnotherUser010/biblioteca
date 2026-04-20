<?php
require_once 'db.php';
$db = conectarDB();

if(!isset($_POST['titulo'], $_POST['autor_id'])){
    echo "Datos incompletos";
    exit;
}

$titulo = $_POST['titulo'];
$autor_id = $_POST['autor_id'];

try {
    $sql = "INSERT INTO libros (titulo, autor_id) VALUES (:titulo, :autor_id)";
    $query = $db->prepare($sql);

    $query->execute([
        'titulo' => $titulo,
        'autor_id' => $autor_id
    ]);

    echo "Libro guardado correctamente";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
