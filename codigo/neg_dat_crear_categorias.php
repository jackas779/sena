<?php
 class Categoria{
     function crear($codigo,$nombre,$user){
         include("conexion.php");
         $contador="0";
         $consulta="SELECT * FROM categorias WHERE codigo_categoria='$codigo'";
         if(!$result=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!! ['.$db->error. '] ');
         }
         while($fila=$result->fetch_assoc()){
             $consulta=stripslashes($fila['id_categorias']);
             $contador+=1;
         }
         if($contador=="0"){
             mysqli_query($db,"INSERT INTO categorias (id_categorias,codigo_categoria,fecha_creacion,descripcion,usuario_creacion,fk_id_estado) VALUES (NULL,'$codigo',CURDATE(),'$nombre','$user','1')") or die (mysqli_error($db));
             header("location: pre_consultar_categorias.php?yes=y");
         }
         if($contador!="0"){
            header("location: pre_crear_categorias.php?err=error");
         }
     }
 }
 $cat=new Categoria();
 $cat->crear($_POST['codigo'],$_POST['nombre'],$_POST['usuario']);


?>