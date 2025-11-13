<html>
    <head><meta charset="UTF-8"></head>
    <link rel="stylesheet" href="login.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <body>
        <header>
            <div class="logo">
                <a href="login_fronted.php" title="registro">
                <img class="logo_bjj" src="../imagenes/logo_bjj_editado.png" alt="logo_bjj">
                </a>
            </div>
            <div class="botones">
                <a href="../Login/login_fronted.php" class="login">Inicio de sesión</a>
                <a href="../Registro/registro_fronted.php" class="registro">Registro</a>
            </div>
        </header>
        <div class="principal">
        <div class="bocadillo">
            <img class="bocadillo_foto" src="../imagenes/bocadillo_sin_fondo.png">
            <div class="bocadillo_texto">¿No tienes cuenta?<br> <a href="../Registro/registro_fronted.php">¡Regístrate aquí!</a></div>
            <img class="panda" src="../imagenes/panda_fondo.png" alt="panda">
        </div>
        <form action="login_backend.php" method="post">
            <h1>Iniciar sesión</h1>
            <br>
            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Email">

            <label for="contraseña">Contraseña</label>
            <input name="contraseña" type="password" placeholder="Contraseña">
            
            <input type="submit" name="login" value="Iniciar sesión">
        </form>
    </body>
</html>