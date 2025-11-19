<?php
session_start();
if(!isset($_SESSION["id_usuario"])) {
    header("Location: ../Login/login_fronted.php");
    exit();
}

require '../Conexion/conexion.php';

$id_usuario = $_SESSION["id_usuario"];

//Obtener los datos del usuario
$consulta = $db -> prepare("SELECT cinturon, grado FROM usuarios WHERE id_usuario = ?");
$consulta -> bind_param("i", $id_usuario);
$consulta -> execute();
$result = $consulta ->get_result();
$usuario = $result-> fetch_assoc();
$consulta-> close();

//Procesar formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_cinturon = $_POST['cinturon'];
    $nuevo_grado = $_POST['grado'];

    $sql_update = "UPDATE usuarios SET cinturon = ?, grado = ? WHERE id_usuario = ?";
    $consulta_update = $db -> prepare($sql_update);
    $consulta_update -> bind_param("sii", $nuevo_cinturon, $nuevo_grado, $id_usuario);
    $consulta_update -> execute();

    if ($consulta_update) {
        echo '<script>
            alert("Cinturón actualizado correctamente");
            window.location ="../Main/main_fronted.php";
            </script>';
    } else {
        echo '<div class="alerta">Error al actualizar: '.mysqli_error($db).' </div>';
    }

        $consulta_update->close();
        mysqli_close($db);

}
?>