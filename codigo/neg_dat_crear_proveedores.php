<?php
 class Proveedores{
     function crear($nombre,$direccion,$telefono,$email,$user){
         include("conexion.php");
         $contador="0";
         $consulta="SELECT * FROM proveedores WHERE nombre='$nombre'";
         if(!$result=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!! ['.$db->error. '] ');
         }
         while($result->fetch_assoc()){
             $contador+=1;
         }
         if($contador=="0"){
             mysqli_query($db,"INSERT INTO proveedores (id_proveedor,nombre,fecha_creacion,direccion,usuario_creacion,fk_id_estado,telefono,email) VALUES (NULL,'$nombre',CURDATE(),'$direccion','$user','1','$telefono','$email')") or die (mysqli_error($db));
             header("location: pre_consultar_proveedores.php");
         }
         if($contador!="0"){
            header("location: pre_consultar_proveedores.php");
         }
     }
 }
 $cat=new Proveedores();
 $cat->crear($_POST['nombre'],$_POST['direccion'],$_POST['telefono'],$_POST['email'],$_POST['usuario']);


?>