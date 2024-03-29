<?php
session_start();

// Verificar si hay un mensaje de éxito para mostrar
if (isset($_SESSION['mensajeExito'])) {
    $mensajeExito = $_SESSION['mensajeExito'];
    unset($_SESSION['mensajeExito']); // Limpiar el mensaje para evitar que se muestre nuevamente

    // Mostrar la alerta después de un retraso de 300 ms después de que la página esté totalmente cargada
    echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                setTimeout(function() {
                    alert("' . $mensajeExito . '");
                }, 300);
            });
          </script>';
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/barranav.css">
    <link rel="stylesheet" href="../Styles/tables.css">

    <title>Generacion</title>
</head>
<body>
    <?php
    include("../conector.php");
    ?>
    <!--Menu-->
    <nav class="stroke">
        <ul>
            <li><a href="../Horario-data.php">Horario</a></li>
            <li><a href="../maestros/maestros-data.php">Maestros</a></li>
            <li><a href="../materias/materias-data.php">Materias</a></li>
            <li><a class="active" href="../generacion/generacion-data.php">Generacion</a></li> <br> <br>
            <li><a href="../mm/mm-data.php">Cursos Docentes</a></li>
            <li><a href="../incidencias/incidencias-data.php">Incidencias</a></li>
            <li><a href="../actext/actext-data.php">Extras</a></li>
            <li><a href="../grupos/grupos-data.php">Grupos</a></li>
            <li><a href="../carrera/carrera-data.php">Carrera</a></li>

        </ul>
    </nav>

    <div class="ContenedorAgregar">
        <a href="./generacion.php">
            <button class="buttonnav"><b>Agregar</b></button>
        </a>
    </div>

    <div>
        <table class = "tablita lineasVerticales">
            <tr id="headerTabla">
                <td><b>ID</b></td>
                <td><b>Generacion</b></td>
                <td><b>Acciones</b></td>
            </tr>

            <?php
            $sql="SELECT * from generacion";
            $result=mysqli_query($conexion,$sql);
            $filas=['ID_Generacion'];
            $idSemestre=$filas;
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr id="datosTabla">
                <td><?php echo $mostrar['ID_Generacion']?></td>
                <td><?php echo $mostrar['Nombre']?></td>
                

                <td id="botonesss">
                    <a href="generacion-edit.php?id=<?php echo $mostrar['ID_Generacion']?>" <button class="button"><b>Editar</b></button></a>
                    <a href="generacion-delete.php?id=<?php echo $mostrar['ID_Generacion']?>" <button class="button1"><b>Borrar</b></button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table> 
    </div>
            <script src ="confirmacion.js"></script>
</body>
</html>