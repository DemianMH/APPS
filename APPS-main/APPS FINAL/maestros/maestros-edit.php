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
        <form  method="post">
            <table class = "tablita lineasVerticales">
                <tr id="headerTabla">
                    <td><b>Nombre del Maestro</b></td>
                    <td><b>Accion</b></td>
                </tr>

                <?php
                $id = $_GET["id"];
                $sql="SELECT * from maestros WHERE ID_Maestro = '$id'";
                $result=mysqli_query($conexion,$sql);
                $filas=['ID_MAESTRO'];
                $idMaestro=$filas;
                while($mostrar=mysqli_fetch_array($result)){
                ?>

                <tr id="datosTabla">
                    <input type="hidden" name="id" value="<?php echo $mostrar['ID_Maestro']?>">
                    <td><input type="text" name="Nombre_maestro" value="<?php echo $mostrar['Nombre_maestro']?>"></td>
                    <td><input type="submit" name ="enviar1"></td>
                </tr>
                <?php
                }
                include("maestros-actualizar.php");
                ?>
            </table> 
            
        </form>
    </div>

</body>
</html>