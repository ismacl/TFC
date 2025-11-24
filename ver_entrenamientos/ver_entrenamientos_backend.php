<?php 

//Conexion con la base de datos
require '../Conexion/conexion.php';

//Recupera el ID del usuario logueado
$id_usuario = $_SESSION['id_usuario'];

// Numero de entrenamientos por pagina
$por_pagina = 8;

//Pagina actual (si no se pasa, es la 1)
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

//Calcular el offset
$offset = ($pagina - 1) * $por_pagina;

//Recupera los entrenamientos del usuario
//Une las tecnicas asociadas a cada entrenamiento
//Agrupa por entrenamiento y ordena por fecha descendente
$sql = "SELECT e.fecha, e.duracion, e.resumen, e.sensaciones,
GROUP_CONCAT(t.nombre_tecnica SEPARATOR', ') AS tecnicas FROM entrenamientos e
LEFT JOIN entrenamiento_tecnica et ON e.id_entrenamiento = et.id_entrenamiento
LEFT JOIN tecnicas t ON et.id_tecnica = t.id_tecnica
WHERE e.id_usuario = ?
GROUP BY e.id_entrenamiento ORDER BY e.fecha DESC LIMIT $por_pagina OFFSET $offset";

$consulta = $db->prepare($sql);
if ($consulta === false) {
    die("Error en prepare: " . $db->error);
}

//Ejecuta la consulta con el ID del usuario
$consulta -> bind_param("i", $id_usuario);
$consulta -> execute();
$result = $consulta->get_result();

//Recorre los resultados y los guarda en el array $entrenamientos
$entrenamientos = [];
while ($fila = $result->fetch_assoc()) {
    $entrenamientos[] = $fila;
}

//Cierra la consulta
$consulta -> close();

//Calcular total de entrenamientos
$total_consulta = $db -> prepare("SELECT COUNT(*) AS total from entrenamientos WHERE id_usuario = ?");
$total_consulta -> bind_param("i", $id_usuario);
$total_consulta -> execute();
$total_result = $total_consulta -> get_result()->fetch_assoc();
$total_consulta -> close();

$total_entrenamientos = $total_result['total'];
$total_paginas = ceil($total_entrenamientos / $por_pagina);
?>