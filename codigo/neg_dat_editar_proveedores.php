<?php

class Proveedor{
    public function editar($id,$nombre,$direccion,$telefono,$email){
        include("conexion.php");
        session_start();
        $user=$_SESSION['username'];
        $contador="0";
        $consulta="SELECT * FROM proveedores WHERE id_proveedor='$id'";
        if(!$resultado=$db->query($consulta)){
            die('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"UPDATE proveedores SET nombre='$nombre', fecha_modificacion=CURDATE(), usuario_modificacion='$user',direccion='$direccion',telefono='$telefono'
            ,email='$email' WHERE id_proveedor='$id' ") OR
            die (mysqli_error($db));
            $_SESSION['status'] = "Se actualizo el proveedor";
            header("location: pre_consultar_proveedores.php");
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se actualizo el proveedor";
            header("location: pre_consultar_proveedores.php");
        }
    }
}
$cat= new Proveedor();
$cat-> editar($_POST['id_prov'],$_POST['nombre'],$_POST['direccion'],$_POST['telefono'],$_POST['email']);
?>