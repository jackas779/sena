<?php
class Marca{
    function eliminar($cod){
        session_start();
        include("conexion.php");
        $contador="0";
        $consulta="SELECT * FROM marcas WHERE id_marca='$cod'";
        if(!$resultado=$db->query($consulta)){
            die ('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"DELETE FROM marcas WHERE id_marca='$cod' ") or die (mysqli_error($db));
            header("location: pre_consultar_marcas.php");
            $_SESSION['status'] = "Se elimino la marca";
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se elimino la marca";
            header("location: pre_consultar_marcas.php");
        }
    }
}
$eli= new Marca();
$eli->eliminar($_POST['id_cod']);
?>