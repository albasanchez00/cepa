<?php
session_start();
if ($_REQUEST["origen"]==="formulario1"){
    if (validarCpostal($_REQUEST["cp"])
        && validarDni($_REQUEST["dni"])
        && validarEdad($_REQUEST["fNacimiento"])
        && validarTexto($_REQUEST["nombre"])
        && validarTexto($_REQUEST["pApellido"])
        && validarTelefono($_REQUEST["telefono"])
        && !empty($_REQUEST["provincia"])
        && !empty($_REQUEST["uEstudio"])
        && !empty($_REQUEST["fechaUltEstudio"])
        && !empty($_REQUEST["direccion"])) {
        header("Location: ../vista/formulario2.php");
    } else {
        header("Location: ../vista/formulario1.php?errores=Faltan datos");
    }
}
function validarTexto($texto)
{
    return true;
}

function validarTelefono($telefono)
{
    return true;
}

function validarEdad($edad)
{
    return true;
}

function validarDni($dni)
{
    return true;
}

function validarCpostal($cp)
{
    return true;
}