<?php
session_start();
if (empty($_SESSION["insertarAlumno"])){
    header("location:formulario1.php?errores=Debe completar el formulario anterior para poder acceder al siguiente");
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
</head>
<body>
    <h1>Formulario de Alta Nuevo Alumno</h1>
    <h2>3️⃣→ Confirmación de Registro</h2>
    <div class="bloque-confirm">
        <h3> Bienvenid@ al Centro de Educación para Adultos, todos sus datos se han registrado correctamente.</h3>
        <h4>💪Le deseamos un agradable comienzo de curso👩‍🏫</h4>
    </div>
    <div class="bloque-confirm">
        <h5 class="centrado">Datos Registrados:</h5>
        <ul>
            <li style="list-style: none">Nombre: <?= $_SESSION["nombreCompleto"]?></li>
            <li style="list-style: none">Teléfono: <?= $_SESSION["telefono"]?></li>
        </ul>
        <p><b>Nota:</b> Su número de registro es <span class="errores"><?php $_SESSION["idRegistro"]?></span></p>
    </div>

</body>
</html>
