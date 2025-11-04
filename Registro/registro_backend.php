<?php
    require'../Conexion/conexion.php';

    //Verifica que se ha enviado el formulario
    if (!empty($_POST['registro'])) {

        //Comprueba que ningun campo esta vacio
        if (empty($_POST['nombre']) or empty($_POST['apellidos']) or empty($_POST['email']) or empty($_POST['contraseña']) or empty($_POST['c_contraseña']) or empty($_POST['fecha_registro'])) {
            echo "<script>alert('No puede haber campos vacios');</script>";
        } else {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            $c_contraseña = $_POST['c_contraseña'];
            $fecha_registro = $_POST['fecha_registro'];

            //Busca si el email ya esta registrado para evitar duplicados
           // $duplicado = "SELECT email from usuarios where email = '$email' ";
            $consulta = $db ->prepare("SELECT * FROM usuarios WHERE email = ? ");
            $consulta -> bind_param("s", $email);
            $consulta -> execute();

            $result = $consulta -> get_result();
            $consulta -> close();


            if(mysqli_num_rows($result) > 0) {

            //Muestra mensaje de error si el email ya existe
            echo '
            <script>
            alert("Ese email ya esta registrado por favor pruebe con otro");
            window.location ="registro_fronted.php";
            </script>';
            
            //Valida que la contraseña tenga el minimo de caracteres
            } elseif(strlen($_POST['contraseña']) < 8) {

                echo '
            <script>
            alert("La contraseña debe tener al menos 8 caracteres");
            window.location ="registro_fronted.php";
            </script>';

            //Verifica que ambas contraseñas coinciden
            }else {
                
                if ($contraseña !== $c_contraseña) { 
                echo '
            <script>
            alert("Las contraseñas no coinciden");
            window.location ="registro_fronted.php";
            </script>';
                } else {
                //Cifra la contraseña antes de guardarla
                $contraseña_segura = password_hash($contraseña, PASSWORD_DEFAULT);

               // $sql = $db ->query("insert into usuarios(nombre, apellidos, email, contraseña, fecha_registro) values ('$nombre','$apellidos','$email','$contraseña_segura','$fecha_registro')");

               //Inserta el nuevo usuario en la base de datos
                $consulta = $db -> prepare("insert into usuarios (nombre, apellidos, email, contraseña, fecha_registro) values (?, ?, ?, ?, ?)");
                $consulta -> bind_param('sssss', $nombre, $apellidos , $email , $contraseña_segura , $fecha_registro);
                $consulta -> execute();

                $consulta-> close();

                //Muestra mensaje segun el resultado
            if ($consulta) {
                echo '<div class="sucess">Usuario registrado correctamente</div>';
                echo '<a href="../Login/login_fronted.php">Volver a Inicio de sesión</a>';
            } else {
                echo '<div class="alerta">Error al registrarse: '.mysqli_error($db).' </div>';
            }
            mysqli_close($db);
            }
            }
        }
}
?>