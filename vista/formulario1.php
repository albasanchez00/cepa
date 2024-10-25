<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cepa</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/formulario1.js"></script>
</head>
<body>
    <h1>Formulario de Alta Nuevo Alumno</h1>
    <h2>1️⃣→ Datos personales del Alumno</h2>
    <form action="../controlador/controlador.php" method="post">
        <input type="hidden" name="origen" value="formulario1">
        <div class="formulario dosColumas">
            <div>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre">
            </div>

            <div>
                <label for="pApellido">Primer Apellido:</label>
                <input type="text" name="pApellido" id="pApellido">
            </div>

            <div>
                <label for="sApellido">Segundo Apellido:</label>
                <input type="text" name="sApellido" id="sApellido">
            </div>

            <div>
                <label for="telefono">Teléfono:</label>
                <input type="text" name="telefono" id="telefono" placeholder="ej: 6XXXXXXXX">
            </div>

            <div>
                <label for="fechaUltEstudio">Fecha Último Estudio:<input type="date" name="fechaUltEstudio" id="fechaUltEstudio"></label>
            </div>

            <div>
                <label for="uEstudio">Último Estudio Cursado:</label>
                <select name="uEstudio" id="uEstudio">
                    <option></option>
                    <?php
                    include("../modelo/conexion.php");//Invocamos el archivo que carga la BBDD.
                    $link=conectarBD(); //Ejecutas la funicon conectarBD().
                    $consulta="SELECT * FROM nivelestudios"; //Se guarda en una variable consulta.
                    $resultado=mysqli_query($link,$consulta); // Se ejecuta la consulta.

                    while($fila=mysqli_fetch_array($resultado)){
                        // Registro asociado a cada campo -> ej: $fila["idEstudios"]  /  $fila["nombreNivel"]
                        echo "<option value='".$fila["idEstudios"]."'>".$fila["nombreNivel"]."</option>";
                    }
                    ?>
                </select>
            </div>

            <div>
                <label for="dni">DNI:</label>
                <input type="text" name="dni" id="dni" placeholder="ej: 000000000X">
            </div>

            <div>
                <label for="fNacimiento">Fecha Nacimiento:</label>
                <input type="date" name="fNacimiento" id="fNacimiento">
            </div>


        </div>

        <div>
            <div class="formulario dosColumas">
                <div>
                    <label for="direccion">Direccion:</label>
                    <input type="text" name="direccion" id="direccion" placeholder="ej: calle benito, 4">
                </div>

                <div>
                    <label for="ciudad">Ciudad:</label>
                    <input type="text" name="ciudad" id="ciudad" placeholder="ej: Madrid">
                </div>

                <div>
                    <label for="cp">Código Postal:</label>
                    <input type="text" name="cp" id="cp" placeholder="ej: XXXXX">
                </div>

                <div>
                    <label for="provincia">Provincia:</label>
                    <select name="provincia" id="provincia">
                        <option></option>
                        <?php
                        $link=conectarBD(); //Ejecutas la funicon conectarBD().
                        $consulta="SELECT * FROM provincia"; //Se guarda en una variable consulta.
                        $resultado=mysqli_query($link,$consulta); // Se ejecuta la consulta.

                        while($fila=mysqli_fetch_array($resultado)){
                            // Registro asociado a cada campo -> ej: $fila["idEstudios"]  /     $fila["nombreNivel"]
                            echo "<option value='".$fila["idProvincia"]."'>".$fila["nombreProvincia"]."</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="enviarBoton">
                    <input type="submit" name="enviarFormulario" value="↪ Siguiente" id="enviarFormulario">
                </div>
                <div class="errores">
                    <?php
                    if (!empty($_GET["errores"])){
                        echo $_GET["errores"];
                    }
                    ?>
                </div>
        </div>



    </form>
</body>
</html>
