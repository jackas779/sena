<?php
include("conexion.php");
$email=$_GET['prueba'];
 $consulta= "SELECT * FROM usuarios WHERE  email='$email'";
 if(!$resultado = $db->query($consulta)){
     die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
     }// la consulta
 while($fila=$resultado->fetch_assoc()){
     $busername=stripslashes($fila['username']);
     $bemail=stripslashes($fila['email']);
     echo $bemail;
 }  
?>