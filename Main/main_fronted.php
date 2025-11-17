<?php 
session_start();
if (!isset($_SESSION["id_usuario"])) { 
    header("Location: ../Login/login_fronted.php");
    exit();
}

require 'main_backend.php';
?>

<html>
    <head>
        <meta charset="UTF-8"><title>Mi perfil</title>
        <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">
        <link rel="stylesheet" href="../footer/footer.css" type="text/css">
    </head>
<body>
    <?php include '../encabezado/encabezado.php';?>

    <h1>Bienvenido, <?php echo $usuario['nombre'].' '. $usuario['apellidos']; ?>!</h1>
    <p>Email:<?php echo $usuario['email'];?></p>
    <p>Fecha de registro: <?php echo $usuario['fecha_registro']; ?></p>
    <p>Fecha de nacimiento: <?php echo $usuario['fecha_nacimiento'];?></p>

    <h2>Acciones disponibles</h2>
    <ul>
        <li><a href="../ver_entrenamientos/ver_entrenamientos_fronted.php">Ver historial</a></li>
        <li><a href="../añadir_entrenamiento/añadir_entrenamiento_fronted.php">Añadir entrenamiento</a></li>
        <li><a href="../ver_tecnicas/ver_tecnicas_fronted.php">Ver tecnicas</a></li>
    </ul>

    <a href="../logout/logout.php">Cerrar sesion</a>

    <?php include '../footer/footer.php' ?>
</body>

</html>