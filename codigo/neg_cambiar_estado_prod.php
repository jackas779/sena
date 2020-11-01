<?php
class   Producto{
    function estado($id){
        session_start();
        include("conexion.php");
        $consulta= "SELECT * FROM productos WHERE id_product='$id'";
        if(!$resultado=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!!['.$db->error.']');
        }
        while($fila=$resultado->fetch_assoc()){
            $bfk_id_estado=stripslashes($fila['fk_id_estado']);
        }
        if($bfk_id_estado=="1"){
            mysqli_query($db,"UPDATE productos SET fk_id_estado='2' WHERE id_product='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_productos.php");
        }
        if($bfk_id_estado=="2"){
            mysqli_query($db,"UPDATE productos SET fk_id_estado='1' WHERE id_product='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_productos.php");
        }
    }
}
$est= new Producto();
$est-> estado($_GET['id']);
?>