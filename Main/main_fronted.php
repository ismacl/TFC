<?php 
session_start();
if (!isset($_SESSION["id_usuario"])) { 
    header("Location: ../Login/login_fronted.php");
    exit();
}

require 'main_backend.php';
?>

<html>
    <head><meta charset="UTF-8"><title>Mi perfil</title></head>
<body>
    <h1>Bienvenido, <?php echo $usuario['nombre'].' '. $usuario['apellidos']; ?>!</h1>
    <p>Email:<?php echo $usuario['email'];?></p>
    <p>Fecha de registro: <?php echo $usuario['fecha_registro']; ?></p>
</body>

</html>