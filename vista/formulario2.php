<?php
session_start();
if (empty($_SESSION["insertarA"])){
    header("location:formulario1.php?errores=No se puede confirmar, porque debe completar todos los cambios");
    exit();
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/formulario2.js"></script>
</head>
<body>
<h1>Formulario de Alta Nuevo Alumno</h1>
<h2>2️⃣→ Persona de Contacto</h2>
    <form action="../controlador/controlador.php" method="post">
        <input type="hidden" name="origen" value="formulario2">
        <div class="formulario unaColuma">
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
                    include_once("../modelo/conexion.php"); //invocamos el archivo que carga la BBDD
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
                <div class="casillaBoton">
                    <input type="checkbox" id="casilla">Acepta la Política de <a href="https://www.aepd.es/" target="_blank">Privacidad y Proteccion de Datos</a>
                </div>
                <div class="casillaBoton">
                    <input type="submit" name="enviarFormulario" value="↪ Finalizar" disabled id="enviarFormulario2">
                </div>

                <div class="errores">
                    <?php
                    if (!empty($_GET["errores"])){
                        echo $_GET["errores"];
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>
</body>
</html>