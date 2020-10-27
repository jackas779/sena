<?php
class   Marca{
    function estado($id){
        session_start();
        include("conexion.php");
        $consulta= "SELECT * FROM marcas WHERE id_marca='$id'";
        if(!$resultado=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!!['.$db->error.']');
        }
        while($fila=$resultado->fetch_assoc()){
            $bfk_id_estado=stripslashes($fila['fk_id_estado']);
        }
        if($bfk_id_estado=="1"){
            mysqli_query($db,"UPDATE marcas SET fk_id_estado='2' WHERE id_marca='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_marcas.php");
        }
        if($bfk_id_estado=="2"){
            mysqli_query($db,"UPDATE marcas SET fk_id_estado='1' WHERE id_marca='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_marcas.php");
        }
    }
}
$est= new Marca();
$est-> estado($_GET['id']);
?>