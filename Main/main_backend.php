<?php 
require '../Conexion/conexion.php';

//Recupera el ID del usuario desde la sesion
$id = $_SESSION['id_usuario'];

//Una consulta segura para obtener todos los datos del usuario y que se ejecuta y guarda los resultados en la variable $usuario
$consulta = $db->prepare("SELECT nombre, apellidos, email, fecha_registro, fecha_nacimiento, cinturon, grado FROM usuarios WHERE id_usuario = ?");
$consulta -> bind_param("i",  $id);
$consulta -> execute();
$result = $consulta->get_result();
$usuario = $result->fetch_assoc();
$consulta -> close();
?>