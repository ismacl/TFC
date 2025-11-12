    <head><meta charset="UTF-8"></head>
    <link rel="stylesheet" href="registro1.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <body>
        <header>
            <div class="logo">
                <a href="registro_fronted.php" title="registro">
                <img class="logo_bjj" src="../imagenes/logo_bjj_editado.png" alt="logo_bjj">
                </a>
            </div>
            <div class="botones">
                <a href="../login/login_fronted.php" class="login">Inicio de sesión</a>
                <a href="registro_fronted.php" class="registro">Registro</a>
            </div>
        </header>
        <div class="principal">
            <img class="panda" src="../imagenes/panda_fondo.png" alt="panda">
        <form class="formulario" action="registro_backend.php" method="post">
           <h1>Registro</h1>
            <br>
            <label for="nombre">Nombre</label>
            <input name="nombre" type="text" placeholder="Nombre">

            <label for="apellidos">Apellidos</label>
            <input name="apellidos" type="text" placeholder="Apellidos">

            <label for="email">Email</label>
            <input name="email" type="text" placeholder="Email">

            <label for="contraseña">Contraseña</label>
            <input name="contraseña" type="password" placeholder="Contraseña">

            <label for="c_contraseña">Confirma la contraseña</label>
            <input name="c_contraseña" type="password" placeholder="Confirmar Contraseña">

            <label for="fecha_registo">Fecha de registro</label>
             <input name="fecha_registro" type="date"> 

            <input type="submit" value="Registrarse" name="registro">
        </form>
        </div>

    </body>
</html>