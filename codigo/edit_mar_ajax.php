<?php
include("conexion.php");
if(isset($_POST)){
    if($_POST['actt']=='infocate'){
        $id=$_POST['mar'];
        $consulta = mysqli_query($db,"SELECT id_marca,nombre FROM marcas 
        WHERE id_marca = '$id' AND fk_id_estado='1'");
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