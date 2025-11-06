<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}

require'ver_entrenamientos_backend.php';
?>

<html>
    <head><meta charset="UTF-8"><title>Historial de Entrenamientos</title></head>
    <body>
        <h1>Mis entrenamientos</h1>

        <?php if (count($entrenamientos) > 0): ?>
        <table border="1">
            <tr>
                <th>Fecha</th>
                <th>Duracion (min)</th>
                <th>Resumen</th>
                <th>Sensaciones</th>
                <th>Tecnicas</th>
            </tr>
            <?php foreach ($entrenamientos as $entreno): ?>
                <tr>
                    <td><?php echo $entreno['fecha']; ?></td>
                    <td><?php echo $entreno['duracion']; ?></td>
                    <td><?php echo $entreno['resumen']; ?></td>
                    <td><?php echo $entreno['sensaciones']; ?></td>
                    <td><?php echo $entreno['tecnicas']; ?></td>
                </tr>
                <?php endforeach; ?>
        </table>
        <?php else: ?>
            <p>No tienes entrenamientos registrados</p>
        <?php endif; ?>

        <a href="../Main/main_fronted.php">Volver al perfil</a>
    </body>
</html>