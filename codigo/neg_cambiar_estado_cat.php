<?php
class Categoria{
    function estado($id){
        include("conexion.php");
        $consulta= "SELECT * FROM categorias WHERE id_categorias='$id'";
        if(!$resultado=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!!['.$db->error.']');
        }
        while($fila=$resultado->fetch_assoc()){
            $bfk_id_estado=stripslashes($fila['fk_id_estado']);
        }
        if($bfk_id_estado=="1"){
            mysqli_query($db,"UPDATE categorias SET fk_id_estado='2' WHERE id_categorias='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_categorias.php");
        }
        if($bfk_id_estado=="2"){
            mysqli_query($db,"UPDATE categorias SET fk_id_estado='1' WHERE id_categorias='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_categorias.php");
        }
    }
}
$est= new Categoria();
$est-> estado($_GET['id']);
?>