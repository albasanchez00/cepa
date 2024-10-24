<?php
session_start();
$errores= array();
if ($_REQUEST["origen"]==="formulario1"){
        validarCpostal($_REQUEST["cp"]);
        validarDni($_REQUEST["dni"]);
        validarEdad($_REQUEST["fNacimiento"]);
        validarTexto($_REQUEST["nombre"],"El nombre");
        validarTexto($_REQUEST["pApellido"],"El apellido");
        validarTelefono($_REQUEST["telefono"]);
        validarVacio($_REQUEST["provincia"],"La provincia");
        validarVacio($_REQUEST["uEstudio"],"El ultimo estudio");
        validarVacio($_REQUEST["fechaUltEstudio"],"La fecha del ultimo estudio");
        validarVacio($_REQUEST["direccion"],"La direccion");


        if (count($errores)>0){
            for ($i=0;$i<count($errores);$i++){
                $todosLosErrores.=$errores[$i];
            }
            header('Location: ../vista/formulario1.php?errores='.$todosLosErrores);
        } else {
            header("Location: ../vista/formulario2.php");
        }
}

if ($_REQUEST["origen"]==="formulario2") {
    validarTexto($_REQUEST["nombreFamiliar"], "Persona Contacto");
    validarTelefono($_REQUEST["telefonoFamiliar"]);
    validarVacio($_REQUEST["relacion"], "La relacion");
    if (count($errores) > 0) {
        for ($i = 0; $i < count($errores); $i++) {
            $todosLosErrores .= $errores[$i];
        }
        header("Location: ../vista/confirmacion.php");
    } else {
        header("Location: ../vista/formulario2.php?errores=$todosLosErrores");
    }
}
function validarTexto($texto,$variable)
{
    global $errores;
    if (!is_string($texto) || empty($texto)||preg_match('/[0-9]/', $texto)){
        $errores[]="<p> $variable no puede estar vacio o contener numeros</p>";
        return false;
    }else{
        return true;
    }
}

function validarVacio($texto,$variable){
    global $errores;
    if (!is_string($texto) || empty($texto)||preg_match('/[0-9]/', $texto)){
        $errores[]="<p> $variable no puede estar vacio o contener numeros</p>";
        return false;
    }else{
        return true;
    }
}

function validarTelefono($telefono)
{
    if (empty($telefono)||!is_numeric($telefono)|| !preg_match("/^[6789]\d{8}$/", $telefono)){
        $errores[]="<p>El formato del telefono es incorrecto, debe comenzar por 6,7,8 o 9 y tener 9 digitos</p>";
        return false;
    }else{
        return true;
    }
}
function validarEdad($fechaNacimiento)
{
    $fechaT=date_create($fechaNacimiento);
    $fechaHoy=date_create();

    return true;
}

function validarDni($dni)
{
    return true;
}

function validarCpostal($cp)
{
    global $errores;
    if (!empty($cp)||!preg_match("/^[0-9]{5}$/",$cp)){
        $errores[]=$errores[]="<p>El codigo postal no puedes estar vacio y debe contener 5 numeros</p>";
        return false;
    }else{
        return true;
    }
}