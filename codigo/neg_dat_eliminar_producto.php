<?php
class Producto{
    function eliminar($cod){
        session_start();
        include("conexion.php");
        $contador="0";
        $consulta="SELECT * FROM productos WHERE codigo='$cod'";
        if(!$resultado=$db->query($consulta)){
            die ('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"DELETE FROM productos WHERE codigo='$cod' ") or die (mysqli_error($db));
            header("location: pre_consultar_productos.php");
            $_SESSION['status'] = "Se elimino el producto";
            exit();
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se elimino el producto";
            header("location: pre_consultar_productos.php");
            exit();
        }
    }
}
$eli= new Producto();
$eli->eliminar($_POST['id']);
?>