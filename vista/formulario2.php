<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Formulario de Alta Nuevo Alumno</h1>
<h2>Datos Persona de Contacto</h2>
    <form action="../controlador/controlador.php" method="post">
        <div class="formulario">
            <div>
                <label for="nombreFamiliar">Nombre del Contacto</label>
                <input type="text" name="nombreFamiliar" id="nombreFamiliar" >
            </div>

            <div>
                <label for="telefonoFamiliar">Teléfono de Contacto</label>
                <input type="text" name="telefonoFamiliar" id="telefonoFamiliar" >
            </div>

            <div>
                <label for="relacion">Parentesco con el Contacto:</label>
                <select name="relacion" id="relacion">
                    <option></option>
                    <?php
                    $link=conectarBD(); //Ejecutas la funicon conectarBD().
                    $consulta="SELECT * FROM parentesco"; //Se guarda en una variable consulta.
                    $resultado=mysqli_query($link,$consulta); // Se ejecuta la consulta.

                    while($fila=mysqli_fetch_array($resultado)){
                        // Registro asociado a cada campo -> ej: $fila["idEstudios"]  /  $fila["nombreNivel"]
                        echo "<option value='".$fila["idRelacion"]."'>".$fila["nombreRelacion"]."</option>";
                    }
                    ?>
                </select>
            </div>

            <div class="enviarBoton">
                <input type="hidden" name="origen" value="formulario2">
                <input type="submit" name="enviarFormulario" value="↪ Finalizar">
            </div>
        </div>

        <div class="errores">
            <?php
            if (!empty($_GET["errores"])){
                echo $_GET["errores"];
            }
            ?>
        </div>
    </form>



</body>
</html>