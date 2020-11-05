<?php

class Categoria{
    public function agregar($codigo,$existencia){
        include("conexion.php");
        session_start();
        $contador="0";
        $consulta="SELECT * FROM productos WHERE id_product='$codigo'";
        if(!$resultado=$db->query($consulta)){
            die('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($fila=$resultado->fetch_assoc()){
            $bexistencia=stripslashes($fila['existencia']);
            $contador+=1;
        }
        $suma=$bexistencia + $existencia;
        if($contador!="0"){
            mysqli_query($db,"UPDATE productos SET existencia='$suma' WHERE id_product='$codigo' ") OR
            die (mysqli_error($db));
            $_SESSION['status'] = "Se actualizo la existencia";
            header("location: pre_consultar_productos.php");
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se actualizo la existencia";
            header("location: pre_consultar_productos.php");
        }
    }
}
$cat= new Categoria();
$cat-> agregar($_POST['product'],$_POST['existencia']);
?>