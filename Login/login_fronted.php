<html>
    <head><meta charset="UTF-8"></head>
    <body>
        <h1>Login</h1>
        <form action="login_backend.php" method="post">
            <div class="email">
            <input name="email" type="text" placeholder="Email"><br>
            </div>

            <div class="contraseña">
            <input name="contraseña" type="password" placeholder="Contraseña"><br>
            </div>
            
            <div name="cuenta">
            <input type="submit" name="login" value="Iniciar sesion">
            ¿No tienes cuenta? <a href="registro_fronted.php">Registrate</a>
            </div>
        </form>
    </body>
</html>