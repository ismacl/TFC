<?php
session_start();
if(!isset($_SESSION['id_usuario'])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio</title>
        <link rel="stylesheet" href="inicio.css" type="text/css">
        <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">
        <link rel="stylesheet" href="../footer/footer.css" type="text/css">
    </head>
    <body>
        <?php include '../encabezado/encabezado.php' ?>
        <main>
            <div class="presentacion">
                <div class="slider">
                    <div class="slider2">
                        <img src="../imagenes/fondo_registro.png" alt="imagen1">
                        <img src="../imagenes/fondo_registro.png" alt="imagen1">
                        <img src="../imagenes/fondo_registro.png" alt="imagen1">
                    </div>
                </div>
                <div class="presentacion_texto">
                    <h2>¿Que es Jiu-Jitsu Zone?</h2>
                    <p>
                        Este es tu espacio para disfrutar del Jiu-Jitsu de una forma sencilla y divertida. Aquí podrás guardar tus entrenamientos, 
                        descubrir nuevas técnicas y ver cómo vas mejorando día a día. 
                        Todo pensado para que tu práctica sea más organizada, motivadora y, sobre todo, ¡más emocionante!
                    </p>
                    <p>
                        Ya seas principiante o veterano, queremos que te sientas acompañado en cada paso de tu camino marcial. 
                        Explora, aprende y comparte… porque el Jiu-Jitsu se vive mejor juntos.
                    </p>
                    <a href="../Main/main_fronted.php" class="boton">Ir a mi perfil</a>
                </div>
            </div>
            <div class="caracteristicas">
                <h2>¿Que encontraras en la web?</h2>
                <div class="tarjetas">
                    <div class="tarjeta">
                        <h3>Entrenamientos</h3>
                        <p>Lleva tu diario de tatami sin complicaciones y revive cada sesión cuando quieras.</p>
                    </div>
                    <div class="tarjeta">
                        <h3>Tecnicas</h3>
                        <p>Descubre movimientos y mejora paso a paso con videos de apoyo.</p>
                    </div>
                    <div class="tarjeta">
                        <h3>Progreso</h3>
                        <p>Ve tu evolución de manera clara y celebra cada logro en tu camino</p>
                    </div>
                </div>
            </div>
        </main>
        <?php include '../footer/footer.php'; ?>
    </body>
</html>