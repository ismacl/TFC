<?php
session_start();
if(!isset($_SESSION['id_usuario'])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}

require '../Conexion/conexion.php';

//Consulta todas las tecnicas y selecciona los campos que se van a mostrar en la tabla
$consulta = $db->query("SELECT nombre_tecnica, tipo, posicion, descripcion, enlace_video FROM tecnicas");
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de tecnicas</title>
        <link rel="stylesheet" href="estilos_tecnicas.css">
    </head>
    <body>
        <h1>Listado de tecnicas</h1>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Posicion</th>
                    <th>Descripcion</th>
                    <th>Video</th>
                </tr>
            </thead>
            <tbody>
                <!--Bucle que recorre cada tecnica obtenida de la base de datos -->
                <?php while ($fila = $consulta -> fetch_assoc()): ?>
                <tr>
                <!--Muestra cada campo de tecnicas -->
                    <td><?php echo htmlspecialchars($fila['nombre_tecnica']); ?></td>
                    <td><?php echo htmlspecialchars($fila['tipo']); ?></td>
                    <td><?php echo htmlspecialchars($fila['posicion']); ?></td>
                    <td><?php echo htmlspecialchars($fila['descripcion']); ?></td>
                    <td>
                    <!-- Si hay enlace lo muestra como ver video y si no hay muestra no hay video-->
                        <?php if (!empty($fila['enlace_video'])): ?>
                        <a href="<?php echo $fila['enlace_video']; ?>" target="_blank">Ver video</a>
                        <?php else: ?>
                            No hay video
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

        <a href="../Main/main_fronted.php">Volver al perfil</a>
    </body>
</html>