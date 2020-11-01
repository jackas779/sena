<?php
include("conexion.php");
if(isset($_POST)){
    if($_POST['actt']=='infocate'){
        $id=$_POST['prov'];
            $consulta = mysqli_query($db,"SELECT P.codigo,P.nombre,P.descripcion,P.fecha_creacion,
            P.usuario_creacion,P.fk_id_categoria,P.fk_id_marca,P.existencia,P.fecha_modificacion,
            P.fk_id_estado,P.id_product,P.fk_id_proveedor,P.usuario_modificacion,P.codigo_barra,
            C.id_categorias,C.cat_descripcion,
            Pr.id_proveedor, Pr.nombre_prov,
            M.id_marca, M.nombre_marca
            FROM productos P 
            INNER JOIN categorias C
            ON P.fk_id_categoria = C.id_categorias
            INNER JOIN proveedores Pr
            ON P.fk_id_proveedor = Pr.id_proveedor
            INNER JOIN marcas M
            ON P.fk_id_marca = M.id_marca
            WHERE P.id_product = '$id' AND P.fk_id_estado='1'");
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
