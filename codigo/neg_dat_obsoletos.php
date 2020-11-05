<?php
class Producto{
    function obsoletos($id,$obsoletos,$mensaje,$codigo,$nombre){
        session_start();
        include("conexion.php");
        $user=$_SESSION['username'];
        $conta="0";
    $consulta="SELECT * FROM productos WHERE id_product='$id'";
    if(!$resultado=$db->query($consulta)){
        die ("hay un error con la busqueda de datos '.$db->error.'");
    }
    while($fila=$resultado->fetch_assoc()){
        $bexistencia= stripcslashes($fila['existencia']);
        $conta+=1;
    }
    $restar=$bexistencia-$obsoletos;
    if($obsoletos>$bexistencia){
        $_SESSION['status']="El numero ingresado no es correcto";
        header("location: pre_consultar_productos.php");
        exit();
        }
    if($obsoletos<="0"){
        $_SESSION['status']="El numero ingresado no es correcto";
        header("location: pre_consultar_productos.php");
        exit();
    }
    if($conta!="0"){
        mysqli_query($db,"INSERT INTO ingresos_det (id_ing_det,fecha_creacion,usuario_creacion,
        cantidad,observacion,fk_id_estado,fk_id_producto,nombre_producto) VALUES (NULL,CURDATE(),'$user',
        '$obsoletos','$mensaje','3','$codigo','$nombre')") or die (mysqli_error($db));
        mysqli_query($db,"UPDATE productos SET fecha_modificacion=CURDATE(), usuario_modificacion='$user',existencia='$restar'
        WHERE id_product='$id' ") OR
        die (mysqli_error($db));
        $_SESSION['status']="Se registro correctamente";
        header("location: pre_consultar_productos.php");
        exit();
    }  

    }
}
$obs= new Producto();
$obs->obsoletos($_POST['product'],$_POST['obsoletos'],$_POST['mensajes'],$_POST['codigo'],$_POST['nombre'])

?>