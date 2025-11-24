<?php
require '../Conexion/conexion.php';

//Numero de tecnicas por pagina
$por_pagina = 10;

//Pagina actual

$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
if ($pagina < 1) $pagina = 1;

//Calcular offset
$offset = ($pagina - 1) * $por_pagina;

//Consulta con LIMIT y OFFSET
$sql = "SELECT nombre_tecnica, tipo, posicion, descripcion, enlace_video FROM tecnicas ORDER BY nombre_tecnica ASC LIMIT $por_pagina OFFSET $offset ";

$consulta = $db -> query($sql);

//Calcular total de tecnicas
$total_result = $db->query("SELECT COUNT(*) AS total FROM tecnicas") -> fetch_assoc();
$total_tecnicas = $total_result['total'];
$total_paginas = ceil($total_tecnicas / $por_pagina);
?>