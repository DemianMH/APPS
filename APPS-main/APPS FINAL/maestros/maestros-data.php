<?php
// Recuperar el mensaje de éxito de la URL si existe
$mensajeExito = isset($_GET['exito']) ? urldecode($_GET['exito']) : null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../Styles/barranav.css">
    <link rel="stylesheet" href="../Styles/tables.css">

    <title>Maestros</title>
</head>
<body>
    <?php
    include("../conector.php");
    ?>
    <!--Menu-->
    <nav class="stroke">
        <ul>
            <li><a href="../Horario-data.php">Horario</a></li>
            <li><a class="active" href="../maestros/maestros-data.php">Maestros</a></li>
            <li><a href="../materias/materias-data.php">Materias</a></li>
            <li><a href="../generacion/generacion-data.php">Generacion</a></li> <br> <br>
            <li><a href="../mm/mm-data.php">Cursos Docentes</a></li>
            <li><a href="../incidencias/incidencias-data.php">Incidencias</a></li>
            <li><a href="../actext/actext-data.php">Extras</a></li>
            <li><a href="../grupos/grupos-data.php">Grupos</a></li>
            <li><a href="../carrera/carrera-data.php">Carrera</a></li>

        </ul>
    </nav>
    <div class="ContenedorAgregar">
        <a href="../maestros/maestros.php">
            <button class="buttonnav"><b>Agregar</b></button>
        </a>
    </div>
    

    <div>
        <table class = "tablita lineasVerticales">
            <tr id="headerTabla">
                <td><b>ID</b></td>
                <td><b>Nombre del Maestro</b></td>
                <td><b>Acciones</b></td>
            </tr>

            <?php
            $sql="SELECT * from maestros";
            $result=mysqli_query($conexion,$sql);
            $filas=['ID_MAESTRO'];
            $idMaestro=$filas;
            while($mostrar=mysqli_fetch_array($result)){
            ?>

            <tr id="datosTabla">
                <td><?php echo $mostrar['ID_Maestro']?></td>
                <td><?php echo $mostrar['Nombre_maestro']?></td>
                
                

                <td id="botonesss">
                    <a href="maestros-edit.php?id=<?php echo $mostrar['ID_Maestro']?>" <button class="button"><b>Editar</b></button></a>
                    <a href="maestros-delete.php?id=<?php echo $mostrar['ID_Maestro']?>" <button class="button1"><b>Borrar</b></button></a>
                </td>
            </tr>
            <?php
            }
            ?>
        </table> 
    </div>
            <script src ="confirmacion.js"></script>
            <script>
             // Función para mostrar la alerta después de la carga de la página
        window.onload = function() {
            <?php if (isset($_GET['exito'])) : ?>
                alert("<?php echo urldecode($_GET['exito']); ?>");
           
            <?php endif; ?>
        };
    </script>
</body>
</html>