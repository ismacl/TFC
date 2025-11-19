<?php
session_start();
if (!isset($_SESSION["id_usuario"])) {
header("Location: ../Login/login_fronted.php");
exit();
}

require '../Conexion/conexion.php';

$id_usuario = $_SESSION["id_usuario"];

$consulta = $db -> prepare("SELECT cinturon, grado FROM usuarios WHERE id_usuario = ?");
$consulta -> bind_param("i", $id_usuario);
$consulta -> execute();
$result = $consulta ->get_result();
$usuario = $result-> fetch_assoc();
$consulta-> close();
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>Editar cinturón</title>
    <link rel="stylesheet" href="../encabezado/encabezado.css" type="text/css">
    <link rel="stylesheet" href="../footer/footer.css" type="text/css">
    <link rel="stylesheet" href="editar_cinturon.css" type="text/css">
</head>
<body>
    <?php include'../encabezado/encabezado.php';?>

    <main>
            <div class="mascota">
                <img src="../imagenes/panda_armario.png" alt="panda">
            </div>
            <div class="tarjeta">
                <h2>Editar cinturón</h2>
                <form method="POST" action="editar_cinturon_backend.php">

                    <label for="cinturon">Selecciona tu cinturón:</label>
                    <select id="cinturon" name="cinturon" required>
                        <option value="Blanco" <?php if($usuario['cinturon']=="Blanco") echo "selected"; ?>>Blanco</option>
                        <option value="Azul" <?php if($usuario['cinturon']=="Azul") echo "selected"; ?>>Azul</option>
                        <option value="Morado" <?php if($usuario['cinturon']=="Morado") echo "selected"; ?>>Morado</option>
                        <option value="Marron" <?php if($usuario['cinturon']=="Marron") echo "selected"; ?>>Marrón</option>
                        <option value="Negro" <?php if($usuario['cinturon']=="Negro") echo "selected"; ?>>Negro</option>
                    </select>

                    <label for="grado">Grado:</label>
                    <select id="grado" name="grado" required>
                        <option value="0" <?php if($usuario['grado']=="0") echo "selected"; ?>>0</option>
                        <option value="1" <?php if($usuario['grado']=="1") echo "selected"; ?>>1</option>
                        <option value="2" <?php if($usuario['grado']=="2") echo "selected"; ?>>2</option>
                        <option value="3" <?php if($usuario['grado']=="3") echo "selected"; ?>>3</option>
                        <option value="4" <?php if($usuario['grado']=="4") echo "selected"; ?>>4</option>
                    </select>

                    <div class="botones">
                        <input class="guardar" type="submit" value="Guardar cambios" name="guardar">
                        <a href="../Main/main_fronted.php" class="cancelar">Cancelar</a>
                    </div>
                </form>
            </div>
    </main>
    <?php include'../footer/footer.php';?>
</body>
</html>