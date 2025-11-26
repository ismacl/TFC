<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}

require'ver_entrenamientos_backend.php';
?>

<html>
    <head>
    <meta charset="UTF-8"><title>Historial de Entrenamientos</title>
    <link rel="stylesheet" href="../footer/footer.css" type="text/css">
    <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">
    <link rel="stylesheet" href="ver_entrenamientos.css" type="text/css">
    <link rel="stylesheet" href="ver_entrenamientos_responsive.css" type="text/css">    
    </head>
    <body>
        <?php include '../encabezado/encabezado.php';?>
        <main>
            <div class="tarjeta">
        <h1>Mis entrenamientos</h1>

        <?php if (count($entrenamientos) > 0): ?>
        <table>
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Duracion (min)</th>
                <th>Resumen</th>
                <th>Sensaciones</th>
                <th>Tecnicas</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($entrenamientos as $entreno): ?>
                <tr>
                    <td  data-label="Fecha"><?php echo $entreno['fecha']; ?></td>
                    <td  data-label="Duracion (min)"><?php echo $entreno['duracion']; ?></td>
                    <td  data-label="Resumen"><?php echo $entreno['resumen']; ?></td>
                    <td  data-label="Sensaciones"><?php echo $entreno['sensaciones']; ?></td>
                    <td  data-label="Tecnicas"><?php echo $entreno['tecnicas']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <?php if ($total_paginas > 1): ?>
            <div class="paginacion">
                <?php if ($pagina > 1): ?>
                    <a href="?pagina=<?php echo $pagina -1; ?>">Anterior</a>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $total_paginas; $i++): ?>
                    <a href="?pagina=<?php echo $i; ?>"
                  class="<?php echo ($i == $pagina) ? 'activo' : ''; ?> ">
                    <?php echo $i; ?>
                </a>
                <?php endfor; ?>

                <?php if ($pagina < $total_paginas): ?>
                    <a href="?pagina=<?php echo $pagina + 1; ?>">Siguiente</a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        
        <?php else: ?>
            <p>No tienes entrenamientos registrados</p>
        <?php endif; ?>

        <a href="../Main/main_fronted.php" class="volver">Volver al perfil</a>
            </div>
        </main>
            <?php include '../footer/footer.php';?>
    </body>
</html>