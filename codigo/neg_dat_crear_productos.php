<?php
class Producto{
    function crear($existencia,$codigo,$nombre,$descripcion,$categoria,$proveedor,$marca,$usuario){
        include("conexion.php");
        session_start();
        $permitido_num="1234567890";
        $contador="0";
        for($i=0;$i<strlen($existencia);$i++){
            if(strpos($permitido_num,substr($existencia,$i,1))===false){
                $_SESSION['status']="la existencia no es valida";
                header("location: pre_crear_productos.php");
                exit();
            }
        }
        $consulta= "SELECT * FROM productos WHERE codigo='$codigo'";
        if(!$resultado = $db->query($consulta)){
            die ('La base de datos no existe o hay un error con los datos ingresados !!! ['.$db->error.']');
        }
        while($resultado->fetch_assoc()){
            $constador+="1";
        }
        if($nombre == "" || $descripcion == "" || $codigo == "" || $categoria == "" || $proveedor == ""|| $marca == ""){
            header("location: pre_crear_productos.php");
            $_SESSION['status']="Error de datos";
            exit ();
        }
        if($contador=="0"){
            mysqli_query($db,"INSERT INTO productos (id_product,codigo,nombre,descripcion,existencia,
                              fecha_creacion,usuario_creacion,fk_id_estado,fk_id_categoria,fk_id_proveedor,
                              fk_id_marca) VALUES (NULL,'$codigo','$nombre','$descripcion','$existencia',
                              CURDATE(),'$usuario','1','$categoria','$proveedor','$marca')") or die (mysqli_error($db));
            $_SESSION['status']="Producto creado";
                header("location: pre_consultar_productos.php");
                exit();
        }
    }
}
$ned= new Producto();
$ned->crear($_POST['existencia'],$_POST['codigo'],$_POST['nombre'],$_POST['descripcion']
,$_POST['categoria'],$_POST['proveedores'],$_POST['marcas'],$_POST['usuario']);
?>