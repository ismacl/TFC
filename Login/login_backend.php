<?php
    //Incluye el archivo que conecta con la base de datos
    require'../Conexion/conexion.php';

    //Recoge los datos enviados desde el formulario
    $email_posted = $_POST['email'];
    $contraseña_posted = $_POST['contraseña'];

    //Prepara y ejecuta una consulta segura para buscar el usuario por email
    //Evita inyecciones SQL por prepare() y bind_param()
    $consulta = $db ->prepare("SELECT * FROM usuarios WHERE email = ? ");
    $consulta -> bind_param("s", $email_posted);
    $consulta -> execute();

    $result = $consulta -> get_result();
    $consulta -> close();

    //Si se encuentra el usuario se extrae su contraseña cifrada
    if (mysqli_num_rows($result) > 0) {

        $only_row = mysqli_fetch_array($result);

        $hash_guardado = $only_row['contraseña'];

        //Verifica si la contraseña introducida coincide con la cifrada
        //Si es correcta, inicia sesion y redirige al main
        if (password_verify($contraseña_posted, $hash_guardado)) {
            session_start();
            $_SESSION['id_usuario'] = $only_row[0];
            header('Location: ../Main/main.php');
            exit();

            //Si la contraseña no coincide muestra un mensaje de error y se vuelve a repetir la pagina
        } else {
            echo '
            <script>
            alert("Contraseña incorrecta.");
            window.location ="login_fronted.php";
            </script>';
            
        }

        //Si no se encuentra el email muestra un mensaje de error y se vuelve a repetir la pagina
    } else {
        echo '
            <script>
            alert("Usuario no encontrado con ese email");
            window.location ="login_fronted.php";
            </script>';

            exit();
    }
?>