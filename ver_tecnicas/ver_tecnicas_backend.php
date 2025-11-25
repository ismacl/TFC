<?php
require '../Conexion/conexion.php';

//Numero de tecnicas por pagina
$por_pagina = 10;

//Pagina actual
$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

//Calcular offset
$offset = ($pagina - 1) * $por_pagina;

// Capturar busqueda
$buscar = isset($_GET['buscar']) ? $_GET['buscar'] : '';

//Consulta con filtro opcional
if (!empty($buscar)) {
    $sql = "SELECT nombre_tecnica, tipo, posicion, descripcion, enlace_video FROM tecnicas WHERE nombre_tecnica LIKE ? ORDER BY nombre_tecnica ASC LIMIT $por_pagina OFFSET $offset";

    $stmt = $db->prepare($sql);
    $like = "%$buscar%";
    $stmt -> bind_param("s", $like);
    $stmt-> execute();
    $consulta = $stmt->get_result();

    //Calcular total filtrado
    $count_sql = $db->prepare("SELECT COUNT(*) AS total FROM tecnicas WHERE nombre_tecnica LIKE ?");
    $count_sql-> bind_param("s", $like);
    $count_sql->execute();
    $total_result = $count_sql->get_result()->fetch_assoc();
    $count_sql->close();
} else {



//Consulta con LIMIT y OFFSET
$sql = "SELECT nombre_tecnica, tipo, posicion, descripcion, enlace_video FROM tecnicas ORDER BY nombre_tecnica ASC LIMIT $por_pagina OFFSET $offset ";
$consulta = $db -> query($sql);

//Calcular total de tecnicas
$total_result = $db->query("SELECT COUNT(*) AS total FROM tecnicas") -> fetch_assoc();
}
$total_tecnicas = $total_result['total'];
$total_paginas = ceil($total_tecnicas / $por_pagina);
?>