<?php
class   Usuario{
    function estado($id){
        session_start();
        include("conexion.php");
        $consulta= "SELECT * FROM usuarios WHERE id_usuario='$id'";
        if(!$resultado=$db->query($consulta)){
            die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!!['.$db->error.']');
        }
        while($fila=$resultado->fetch_assoc()){
            $bfk_id_permisos=stripslashes($fila['fk_id_permisos']);
        }
        if($bfk_id_permisos=="1"){
            mysqli_query($db,"UPDATE usuarios SET fk_id_permisos='0' WHERE id_usuario='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_usuarios.php");
        }
        if($bfk_id_permisos=="0"){
            mysqli_query($db,"UPDATE usuarios SET fk_id_permisos='1' WHERE id_usuario='$id'")
            or die (mysqli_error($db));
            header("location: pre_consultar_usuarios.php");
        }
    }
}
$est= new Usuario();
$est-> estado($_GET['id']);
?>