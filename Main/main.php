<?php
    require'../Conexion/conexion.php';
?>

<html>
    <body>
        <h1>Hola</h1>
        <?php
        $query = 'SELECT * FROM usuarios';
        $result = mysqli_query($db, $query) or die('Query error');
        while ($row = mysqli_fetch_array($result)) {
            echo $row['nombre'];
            echo '<br>';
            echo $row[2];
            echo '<br>';
        }

        mysqli_close($db);
        ?>
    </body>
</html>