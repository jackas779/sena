<?php
 class Marca{
     function crear($nombre,$user){
         include("conexion.php");
         $contador="0";
         $consulta="SELECT * FROM marcas WHERE nombre_marca='$nombre'";
         if(!$result=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!! ['.$db->error. '] ');
         }
         while($result->fetch_assoc()){
             $contador+=1;
         }
         if($contador=="0"){
             mysqli_query($db,"INSERT INTO marcas (id_marca,nombre_marca,fecha_creacion,usuario_creacion,fk_id_estado) VALUES (NULL,'$nombre',CURDATE(),'$user','1')") or die (mysqli_error($db));
             header("location: pre_consultar_marcas.php");
         }
         if($contador!="0"){
            header("location: pre_consultar_marcas.php");
         }
     }
 }
 $cat=new Marca();
 $cat->crear($_POST['nombre'],$_POST['usuario']);


?>