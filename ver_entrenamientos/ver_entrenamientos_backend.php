<?php 

//Conexion con la base de datos
require '../Conexion/conexion.php';

//Recupera el ID del usuario logueado
$id_usuario = $_SESSION['id_usuario'];

//Recupera los entrenamientos del usuario
//Une las tecnicas asociadas a cada entrenamiento
//Agrupa por entrenamiento y ordena por fecha descendente
$consulta = $db->prepare("SELECT e.fecha, e.duracion, e.resumen, e.sensaciones,
GROUP_CONCAT(t.nombre_tecnica SEPARATOR', ') AS tecnicas FROM entrenamientos e
LEFT JOIN entrenamiento_tecnica et ON e.id_entrenamiento = et.id_entrenamiento
LEFT JOIN tecnicas t ON et.id_tecnica = t.id_tecnica
WHERE e.id_usuario = ?
GROUP BY e.id_entrenamiento ORDER BY e.fecha DESC");

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

?>