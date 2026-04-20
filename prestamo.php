<?php
require_once 'db.php';
$db = conectarDB();

if(!isset($_POST['id_usuario'], $_POST['id_libro'])){
    echo "Datos incompletos";
    exit;
}

$usuario_id = $_POST['id_usuario'];
$libro_id = $_POST['id_libro'];

try {
    $sql = "INSERT INTO prestamos (id_usuario, id_libro, fecha) 
            VALUES (:id_usuario, :id_libro, NOW())";

    $query = $db->prepare($sql);

    $query->execute([
        'id_usuario' => $usuario_id,
        'id_libro' => $libro_id
    ]);

    echo "Préstamo registrado correctamente";

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
