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
        <title>Contacto</title>
        <link rel="stylesheet" href="contacto.css" type="text/css">
        <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">
        <link rel="stylesheet" href="../footer/footer.css" type="text/css">
    </head>
    <body>
        <?php include '../encabezado/encabezado.php'; ?>
        <main>
            <div class="tarjeta contacto_contenedor">
                <div class="formulario">
                <h1>Contacto</h1>
                <p>Si tienes dudas, sugerencias o quieres comunicarte con nosotros completa el formulario:</p>

                <form method="post" action="contacto_backend.php" class="form_contacto">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>

                    <label for="email">Correo electronico</label>
                    <input type="email" id="email" name="email" required>

                    <label for="mensaje">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="5" required></textarea>

                    <button type="submit">Enviar</button>
                </form>

                <a class="volver" href="../Main/main_fronted.php">Volver al perfil</a>
                </div>
                <div class="mapa">
                <h2>Ubicación</h2>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d215.64970410035068!2d-8.42449782998483!3d43.347219724643175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2e7ce9f05629bb%3A0xc0899d578067993!2sFight%20Factory!5e0!3m2!1ses!2ses!4v1764073455305!5m2!1ses!2ses" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </main>
        <?php include '../footer/footer.php'; ?>
    </body>
</html>