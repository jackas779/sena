<?php

class Producto{
    public function editar($id,$codigo,$nombre,$descripcion,$categorias,$proveedores,$marcas){
        include("conexion.php");
        session_start();
        $user=$_SESSION['username'];
        $contador="0";
        $consulta="SELECT * FROM productos WHERE id_product='$id'";
        if(!$resultado=$db->query($consulta)){
            die('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"UPDATE productos SET codigo='$codigo', nombre='$nombre', fecha_modificacion=CURDATE(), usuario_modificacion='$user',descripcion='$descripcion',fk_id_categoria='$categorias',fk_id_proveedor='$proveedores',fk_id_marca='$marcas'
            WHERE id_product='$id' ") OR
            die (mysqli_error($db));
            $_SESSION['status'] = "Se actualizo el producto";
            header("location: pre_consultar_productos.php");
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se actualizo el producto";
            header("location: pre_consultar_productos.php");
        }
    }
}
$cat= new Producto();
$cat-> editar($_POST['id'],$_POST['codigo'],$_POST['nombre'],$_POST['descripcion']
,$_POST['categorias'],$_POST['proveedores'],$_POST['marcas']);
?>