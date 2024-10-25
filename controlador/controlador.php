<?php
session_start();
/**
 * Array de errores que se utiliza tanto en el Formulario1 como en el Formulario2.
 * Se inicializa cada vez que se llama el archivo controlador.
 */
$errores= array();


/**
 * La siguiente condicion lee desde donde se reciba el formulario y valida los camposimportantes u obligatorios.
 * Si todo es correcto, envía al siguiente formulario.
 * En caso de error, se envía cuales campos tienen error para su corrección.
 *
 */
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

        // Si detecta algún error: lo recoge, lo guarda y no continua.
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


/**
 * @param $texto
 * @param $variable
 * @return bool
 * Función que valida cualquier texto, indicará un error en la variable global en caso de que esté vacío o contener algún número.
 */
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


/**
 * @param $texto
 * @param $variable
 * @return void
 * Función que recibe un valor y su campo a la que hace referencia.
 * En caso de estar vacío, guarda en la variable global el mensaje d error haciendo referencia a su campo.
 * Ejemplo -> La ciudad no puede estar vacío.
 */
function validarVacio($texto,$variable){
    global $errores;
    if (empty($valor)){
        $errores[]="<p> $variable no puede estar vacio</p>";
    }
}


/**
 * @param $telefono
 * @return void
 * Función que valida un número telefónico de España con 9 dígitos y que comiencen por 6/7/8/9
 * En caso de error lo guarda en la variable global del mensaje.
 */
function validarTelefono($telefono)
{
    global $errores;
    if (empty($telefono)||!is_numeric($telefono)|| !preg_match("/^[6789]\d{8}$/", $telefono)) {
        $errores[] = "<p>El formato del telefono es incorrecto, debe comenzar por 6,7,8 o 9 y tener 9 digitos</p>";
    }
}


/**
 * @param $fecha
 * @return void
 * @throws Exception
 * Función que reciba la fecha de nacimiento y calcula con respecto a la fecha actual la edad del alumnno
 * En caso de no tener 18 años o más, se guarda un error en la variable global que no puede ser menor de edad.
 */
function validarEdad($fecha)
{
    global $errores;
    $fechaN=new DateTime($fecha);
    // Obtener la diferencia entre la fecha actual y la fecha de naicimiento
    $diferencia=$fecha->diff($fechaN); // Metodo que calcula la diferencia entre dos fechas

    // Obtener la edad en años
    $edad=$diferencia->y;
    if ($edad<18)
    {
        $errores[]="<p>Tienes $edad anios. La edad no puede ser menor a 18 años</p>";
    }
}

/**
 * @param $dni
 * @return void
 * Función que valida el DNI con el formato y la letra correcta
 * En caso de error, se guarda en la variable global si el error es de formato o de la letra.
 */
function validarDni($dni)
{
    global $errores;
    if (preg_match("/^[0-9]{8}$/", $dni)){ // Expresión regular que solo valída el formato del DNI.
        // Separar ka ketra del DNI
        $numero=substr($dni,0,8);
        $letra=strtoupper(substr($dni,-1));

        // Letras de control
        $letras_validas="TRWAGMYFPDXBNJZSQVHLCKE";

        // Calcular la letra correspondiente al número¡
        $indice=$numero%23;
        $letras_correctas=$letras_validas[$indice];

        // Verificar si la letra coincide
        if ($letras_correctas!=$letra){
            $errores[]="<p>El DNI invalido (formato incorrecto)</p>";
        }
    }else{
        $errores[]="<p>El DNI tiene formato incorrecto</p>";
    }
}


/**
 * @param $cp
 * @return void
 * Función que recibe un código postal y valída que sean 5 dígitos numéricos
 * En caso de error, se guarda en la variable global el mensaje.
 */
function validarCpostal($cp)
{
    global $errores;
    if (empty($cp)||!preg_match("/^[0-9]{5}$/",$cp)) {
        $errores[] = $errores[] = "<p>El codigo postal no puedes estar vacio y debe contener 5 numeros</p>";
    }
}