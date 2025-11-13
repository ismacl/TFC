<?php
    require'../Conexion/conexion.php';

    //Verifica que se ha enviado el formulario
    if (!empty($_POST['registro'])) {

        //Comprueba que ningun campo esta vacio
        if (empty($_POST['nombre']) or empty($_POST['apellidos']) or empty($_POST['email']) or empty($_POST['contraseña']) or empty($_POST['c_contraseña']) or empty($_POST['fecha_nacimiento'])) {
            echo 
            '<script>
            alert("No puede haber campos vacios");
            window.location ="registro_fronted.php";
            </script>';
        } else {
            $nombre = $_POST['nombre'];
            $apellidos = $_POST['apellidos'];
            $email = $_POST['email'];
            $contraseña = $_POST['contraseña'];
            $c_contraseña = $_POST['c_contraseña'];
            $fecha_nacimiento = $_POST['fecha_nacimiento'];

            //Pone la fecha actual en la que te registras
            $fecha_registro = date('Y-m-d');

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
                $consulta = $db -> prepare("insert into usuarios (nombre, apellidos, email, contraseña, fecha_registro, fecha_nacimiento) values (?, ?, ?, ?, ?, ?)");
                $consulta -> bind_param('ssssss', $nombre, $apellidos , $email , $contraseña_segura , $fecha_registro, $fecha_nacimiento);
                $consulta -> execute();

                $consulta-> close();

                //Muestra mensaje segun el resultado
            if ($consulta) {
                echo '<script>
            alert("Usuario registrado correctamente");
            window.location ="../Login/login_fronted.php";
            </script>';
                
            } else {
                echo '<div class="alerta">Error al registrarse: '.mysqli_error($db).' </div>';
            }
            mysqli_close($db);
            }
            }
        }
}
?>