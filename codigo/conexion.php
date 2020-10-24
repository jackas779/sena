<?php 
$db= new mysqli('localhost', 'root','','strong_inventory');
//conexion a base de datos, orden* servidor-usuario-contraseña-base de datos
$acentos = $db->query("SET NAMES 'utf8'");// linea para ingresar caracteres especiales de español a la base de datos
if($db->connect_error > 0){
    die('Incapaz de conectar a la base de datos[' . $db->connect_error . ']');
}
?>