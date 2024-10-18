<?php
/* Este archivo contiene todo lo necesario para que se conecte
con la base de datos BBDD personas y pueda realizarse consultar, insercciones,eliminación y actualización. */

//1.Definimos los párametros de conexión
$servidor = "localhost"; //nombre del servidor
$usuario = "root"; //nombre del usuario
$password=""; //contraseña del usuario
$puerto = "3306"; //puerto de conexion con la Base de Datos
$bbdd = "cepa";

function conectarBD(){
    global $servidor, $usuario, $password, $puerto, $bbdd;
    //Creamos la conexion
    $conexion = mysqli_connect($servidor.":".$puerto,$usuario, $password);
    //Verificar si se coencta la BBDD
    if(mysqli_error($conexion)){
        //echo "Error al conectar con la base de datos: ";
    }else{
        //echo "Conexión exitosa"; //temporalmente
    }
    if(!mysqli_select_db($conexion, $bbdd)){
        //echo "<br>Error al conectar con la base de datos: ";
        exit();
    }else{
        //echo "<br>Conexión exitosa";
    }
    return $conexion;
}

//$conexion = conectarBD();