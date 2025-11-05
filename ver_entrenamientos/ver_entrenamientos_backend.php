<?php 
require '../Conexion/conexion.php';

$id_usuario = $_SESSION['id_usuario'];

$consulta = $db->prepare("SELECT e.fecha, e.duracion, e.resumen, e.sensaciones
GROUP_CONCAT(t.nombre_tecnica SEPARATOR', ') AS tecnicas FROM entrenamientos e
LEFT JOIN entrenamiento_tecnica et ON e.id_entrenamiento = et.id_entrenamiento
LEFT JOIN tecnicas t ON et.id_tecnica = t.id_tecnica
WHERE e.id_usuario = ?
GROUP BY e.id_entrenamiento
ORDER BY e.fecha DESC");

$consulta -> bind_param("i", $id_usuario);
$consulta -> execute();
$result = $consulta->get_result();

$entrenamientos = [];
while ($fila = $result->fetch_assoc()) {
    $entrenamientos[] = $fila;
}

$consulta -> close();

?>