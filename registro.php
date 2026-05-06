<?php

require_once 'db.php';
$db = conectarDB();

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

try {

    // verificar si existe
    $sql = "SELECT id_usuario FROM usuarios WHERE email = :email";
    $query = $db->prepare($sql);
    $query->execute(['email' => $email]);

    if ($query->fetch()) {
        echo "email_existe";
        exit;
    }

    // hashear password (IMPORTANTE)
    $hash = password_hash($pwd, PASSWORD_DEFAULT);

    // insertar usuario
    $sql = "INSERT INTO usuarios (nombre, email, password)
            VALUES (:nombre, :email, :password)";

    $query = $db->prepare($sql);
    $query->execute([
        'nombre' => $nombre,
        'email' => $email,
        'password' => $hash
    ]);

    echo "ok";

} catch (PDOException $e) {
    echo "error: " . $e->getMessage();
}

?>