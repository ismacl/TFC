    <head><meta charset="UTF-8"></head>
    <body>
        <h1>Registro</h1>
        <form action="registro_backend.php" method="post">
            <div class="nombre">
            <input name="nombre" type="text" placeholder="Nombre"><br>
            </div>

            <div class="apellidos">
            <input name="apellidos" type="text" placeholder="Apellidos"><br>
            </div>

            <div class="email">
            <input name="email" type="text" placeholder="Email"><br>
            </div>

            <div class="contraseña">
            <input name="contraseña" type="password" placeholder="Contraseña"><br>
            </div>

            <div class="c_contraseña">
            <input name="c_contraseña" type="password" placeholder="Confirmar Contraseña"><br>
            </div>

            <div class="fecha_registro">
             <input name="fecha_registro" type="date">   
            </div>

            <div class="cuenta">
            <input type="submit" value="Registrarse" name="registro">
            <a href="../Login/login_fronted.php">Volver a Inicio de sesión</a>
            </div>
        </form>
    </body>
</html>