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
        <link rel="stylesheet" href="main.css" type="text/css">
    </head>
<body>
    <?php include '../encabezado/encabezado.php';?>

<main>

<div class="mascota">
    <img src="../imagenes/panda_perfil.png">
</div>

<div class="perfil">
    <div class="cabeza_perfil">
            <img src="../imagenes/foto_perfil.jpg" alt="foto de perfil">
        <div class="info">
            <h1>Bienvenido, <?php echo $usuario['nombre'].' '. $usuario['apellidos']; ?>!</h1>
            <p class="miembro">Miembro desde: <?php echo $usuario['fecha_registro']; ?></p>
        </div>
    </div>

    <a href="#" class="boton_datos">Datos personales</a>

    <div class="perfil_datos">
        <p>Fecha de nacimiento: <?php echo $usuario['fecha_nacimiento'];?></p>
        <p>Email:<?php echo $usuario['email'];?></p>
        <p>Cinturon:<?php echo $usuario['cinturon'];?></p>
        <p>Grado: <?php echo $usuario['grado']; ?></p>
        <a href="../editar_cinturon/editar_cinturon_fronted.php" class="editar">Editar cinturón</a>
    </div>
</div>

    <div class="acciones">
        <a href="../ver_entrenamientos/ver_entrenamientos_fronted.php">Ver historial</a>
        <a href="../añadir_entrenamiento/añadir_entrenamiento_fronted.php">Añadir entrenamiento</a>
        <a href="../ver_tecnicas/ver_tecnicas_fronted.php">Ver técnicas</a>
        <a href="../logout/logout.php" class="logout">Cerrar sesión</a>
    </div>
</main>

    <?php include '../footer/footer.php' ?>
</body>
</html>