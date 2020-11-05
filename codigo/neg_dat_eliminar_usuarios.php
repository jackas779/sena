<?php
class Usuario{
    function eliminar($cod){
        session_start();
        include("conexion.php");
        $contador="0";
        $consulta="SELECT * FROM usuarios WHERE id_usuario='$cod'";
        if(!$resultado=$db->query($consulta)){
            die ('Error al conectar a la base de datos o los datos son incorrectos['. $db->error .']');
        }
        while($resultado->fetch_assoc()){
            $contador+=1;
        }
        if($contador!="0"){
            mysqli_query($db,"DELETE FROM usuarios WHERE id_usuario='$cod' ") or die (mysqli_error($db));
            $_SESSION['status'] = "Se elimino el usuario";
            header("location: pre_consultar_usuarios.php");
            
        }
        if($contador=="0"){
            $_SESSION['status'] = "No se elimino el usuario";
            header("location: pre_consultar_usuarios.php?n");
        }
    }
}
$eli= new Usuario();
$eli->eliminar($_POST['id_cod']);
?>