<?php
include("conexion.php");
if(isset($_POST)){
    if($_POST['actt']=='infocate'){
        $id=$_POST['prov'];
        $consulta = mysqli_query($db,"SELECT id_proveedor,nombre_prov,direccion,telefono,email_prov FROM proveedores
        WHERE id_proveedor = '$id' AND fk_id_estado='1'");
        mysqli_close($db);
        $resultado=mysqli_num_rows($consulta);
        if($resultado > 0){
            $fila =mysqli_fetch_assoc($consulta);
            echo json_encode($fila,JSON_UNESCAPED_UNICODE) ;
            exit();
        }
        echo "error";
        exit();
    }
}
exit();

?>
