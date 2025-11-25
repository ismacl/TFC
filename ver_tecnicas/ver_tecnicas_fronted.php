<?php
session_start();
if(!isset($_SESSION['id_usuario'])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}
require'ver_tecnicas_backend.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de tecnicas</title>
        <link rel="stylesheet" href="ver_tecnicas.css" type="text/css">
        <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">
        <link rel="stylesheet" href="../footer/footer.css" type="text/css">
    </head>
    <body>
        <?php include '../encabezado/encabezado.php';?>
        <main>
        <h1>Listado de tecnicas</h1>

        <form method="get" class="buscador">
            <input type="text" name="buscar" placeholder="Buscar tecnica"
                value="<?php echo htmlspecialchars($buscar) ?>">
            <button type="submit">Buscar</button>
        </form>

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

        <?php if ($total_paginas > 1): ?>
            <div class="paginacion">
                <?php if ($pagina > 1): ?>
                    <a href="?pagina=<?php echo $pagina -1; ?>&buscar=<?php echo urlencode($buscar); ?>">Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <a href="?pagina=<?php echo $i; ?> &buscar=<?php echo urlencode($buscar); ?>"
                    class="<?php echo ($i == $pagina) ? 'activo' : ''; ?>">
                    <?php echo $i; ?>
                </a>
                <?php endfor; ?>

                <?php if ($pagina < $total_paginas): ?>
                    <a href="?pagina=<?php echo $pagina + 1 ?>">Siguiente</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <a class="volver" href="../Main/main_fronted.php">Volver al perfil</a>
        </main>
        <?php include '../footer/footer.php';?>
    </body>
</html>