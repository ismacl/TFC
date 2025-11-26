<?php
require '../Conexion/conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $mensaje = $_POST['mensaje'];

    $stmt = $db->prepare("INSERT INTO mensajes_contacto (nombre, email, mensaje, fecha_mensaje) VALUES (?, ?, ?, NOW())");
    $stmt -> bind_param("sss", $nombre, $email, $mensaje);
    $stmt -> execute();
    $stmt -> close();

    echo "<p>Gracias por tu mensaje. Nos pondremos en contacto contigo pronto</p>";
    echo "<a href='contacto_fronted.php'>Volver</a>";
}

?>