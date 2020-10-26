<?php
class Proveedor{
    function eliminar($cod){
        session_start();
        include("conexion.php");
        $contador="0";
        $consulta="SELECT * FROM proveedores WHERE id_proveedor='$cod'";
        if(!$resultado=$db->query($consulta)){
            die ('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"DELETE FROM proveedores WHERE id_proveedor='$cod' ") or die (mysqli_error($db));
            $_SESSION['status'] = "Se elimino el proveedor";
            header("location: pre_consultar_proveedores.php");
            
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se elimino el proveedor";
            header("location: pre_consultar_proveedores.php?n");
        }
    }
}
$eli= new Proveedor();
$eli->eliminar($_POST['id']);
?>