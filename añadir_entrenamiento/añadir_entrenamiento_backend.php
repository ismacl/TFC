<?php
session_start();
require '../Conexion/conexion.php';

if (!isset($_SESSION['id_usuario'])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}

//Recupera los datos enviados por el formulario
//$tecnicas es un array con los IDs seleccionados
$id_usuario = $_SESSION['id_usuario'];
$fecha = $_POST['fecha'];
$duracion = $_POST['duracion'];
$resumen = $_POST['resumen'];
$sensaciones = $_POST['sensaciones'];
$tecnicas = isset($_POST['tecnicas']) ? $_POST['tecnicas'] : [];

//Insertar entrenamiento en la tabla entrenamientos
//Guarda el ID generado para asociarlo con las tecnicas
$insert = $db -> prepare("INSERT INTO entrenamientos (id_usuario, fecha, duracion, resumen, sensaciones) VALUES (?, ?, ?, ?, ?)");
$insert -> bind_param("isiss", $id_usuario, $fecha, $duracion, $resumen, $sensaciones);
$insert -> execute();
$id_entrenamiento = $insert -> insert_id;
$insert->close();

//Insertar tecnicas asociadas
//Recorre cada tecnica seleccionada
//Inserta una relacion en la tabla entrenamiento_tecnica
foreach ($tecnicas as $id_tecnica) {
    $id_tecnica = trim($id_tecnica);
    if (is_numeric($id_tecnica)) {
        $relacion = $db -> prepare("INSERT INTO entrenamiento_tecnica (id_entrenamiento, id_tecnica) VALUES (?, ?)");
        $relacion -> bind_param("ii", $id_entrenamiento, $id_tecnica);
        $relacion -> execute();
        $relacion -> close();
    }
}

//Redirigir al historial
header("Location:../ver_entrenamientos/ver_entrenamientos_fronted.php");
exit();
?>