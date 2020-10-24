<?php

class Categoria{
    public function editar($codigo,$nombre){
        include("conexion.php");
        session_start();
        $user=$_SESSION['username'];
        $contador="0";
        $consulta="SELECT * FROM categorias WHERE codigo_categoria='$codigo'";
        if(!$resultado=$db->query($consulta)){
            die('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($fila=$resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"UPDATE categorias SET descripcion='$nombre', fecha_modificacion=CURDATE(), usuario_modificacion='$user' WHERE codigo_categoria='$codigo' ") OR
            die (mysqli_error($db));
            header("location: pre_consultar_categorias.php?edi=y");
        }
        if($contador=="0"){
            echo "No se actualizo la categoria";
        }
    }
}
$cat= new Categoria();
$cat-> editar($_POST['codigo'],$_POST['descripcion']);
?>