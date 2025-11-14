<?php
session_start();
if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}

require '../Conexion/conexion.php';

//Recupera todas las tecnicas disponibles desde las base datos
//Las guarda en una array para mostrarlas en el formulario
$consulta = $db->query("SELECT id_tecnica, nombre_tecnica FROM tecnicas");
$lista_tecnicas = [];
while($fila = $consulta-> fetch_assoc()) {
    $lista_tecnicas[] = $fila;
}
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Añadir entrenamiento</title>
        <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">

<!--Carga la hoja de estilos de Select2 -->
<!-- Esta liberria define el aspecto del campo de seleccion con busqueda de las tecnicas-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!--Carga la libreria jQuery que es necesaria para que Select2 funcione -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!--Carga la libreria Select2 que transforma el <select> en un campo con busqueda, etiquetas y seleccion multiple-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
    <body>
        <?php include '../encabezado/encabezado.php';?>
        <h1>Nuevo entrenamiento</h1>

        <form action="añadir_entrenamiento_backend.php" method="POST">
            <label>Fecha:</label><br>
            <input type="date" name="fecha" required><br>

            <label>Duracion (min):</label><br>
            <input type="number" name="duracion" required><br>

            <label>Resumen:</label><br>
            <textarea name="resumen" rows="4" cols="50" required></textarea><br>

            <label>Sensaciones:</label><br>
            <textarea name="sensaciones" rows="3" cols="50" required></textarea><br>
        
            <!--Muestra todas las tecnicas disponibles, permite seleccionar varias
             y la libreria Select2 añade busqueda y etiquetas -->
            <label>Tecnicas utilizadas:</label><br>
            <select id="tecnicas" name="tecnicas[]" multiple="multiple">
                <?php foreach ($lista_tecnicas as $tecnica):?>
                    <option value= "<?php echo $tecnica ['id_tecnica'];?>">
                        <?php echo htmlspecialchars($tecnica['nombre_tecnica']); ?>
                </option>
                <?php endforeach; ?>
            </select><br>

            <input type="submit" value="Guardar entrenamiento">
        </form>

        <a href="../Main/main_fronted.php">Volver al perfil</a>

                <!--Convierte el select en un campo con busqueda -->
        <script>
            $(document).ready(function() {
                $('#tecnicas').select2({
                    placeholder: "Busca y selecciona tecnicas",
                    allowClear: true,
                    width: '300px'
                });
            });
        </script>
    </body>
</html>