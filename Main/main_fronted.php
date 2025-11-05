<?php 
session_start();
if (!isset($_SESSION["id_usuario"])) { 
    header("Location: ../Login/login_fronted.php");
    exit();
}
?>

<html>
    <head><meta charset="UTF-8"><title>Mi perfil</title></head>
<body>
    <h1>Bienvenido Usuario <!--<?php echo $usuario['nombre'].''. $usuario['apellidos']; ?>! --></h1>
    <p>Email: usuario@gmail.com<!--<?php echo $usuario['email'];?>--></p>
</body>

</html>