<?php
class Categoria{
    function eliminar($cod){
        session_start();
        include("conexion.php");
        $contador="0";
        $consulta="SELECT * FROM categorias WHERE codigo_categoria='$cod'";
        if(!$resultado=$db->query($consulta)){
            die ('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"DELETE FROM categorias WHERE codigo_categoria='$cod' ") or die (mysqli_error($db));
            header("location: pre_consultar_categorias.php");
            $_SESSION['status'] = "Se elimino la categoria";
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se elimino la categorias";
            header("location: pre_consultar_categorias.php?n");
        }
    }
}
$eli= new Categoria();
$eli->eliminar($_POST['id_cod']);
?>