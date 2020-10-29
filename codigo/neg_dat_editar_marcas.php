<?php

class Marca{
    public function editar($id,$nombre){
        include("conexion.php");
        session_start();
        $user=$_SESSION['username'];
        $contador="0";
        $consulta="SELECT * FROM marcas WHERE id_marca='$id'";
        if(!$resultado=$db->query($consulta)){
            die('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"UPDATE marcas SET nombre_marca='$nombre', fecha_modificacion=CURDATE(), usuario_modificacion='$user' WHERE id_marca='$id' ") OR
            die (mysqli_error($db));
            $_SESSION['status'] = "Se actualizo la marca";
            header("location: pre_consultar_marcas.php");
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se actualizo la marca";
            header("location: pre_consultar_marcas.php");
        }
    }
}
$cat= new Marca();
$cat-> editar($_POST['id'],$_POST['nombre']);
?>