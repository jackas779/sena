<?php 
class login{
    public function evaluar_sesion($usuario,$password){
        include("conexion.php");
        $consulta= "SELECT * FROM usuarios WHERE username='$usuario' OR email='$usuario'";
        if(!$resultado = $db->query($consulta)){
            die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
            }// la consulta
        $contador="0";    
        while($fila=$resultado->fetch_assoc()){
            $bemail=stripslashes($fila['email']);
            $busername=stripslashes($fila['username']);
            $bpassword=stripslashes($fila['password']);
            $bfk_id_estado=stripslashes($fila['fk_id_estado']);
            $bfk_id_permiso=stripslashes($fila['fk_id_permisos']);
        } 
        if($bfk_id_estado=="1" && $bfk_id_permiso=="1"){
            if($busername==$usuario || $bemail==$usuario){
                if($bpassword==$password){
                    $contador+=1;
                    session_start();
                    $_SESSION["admin"]="1";
                    $_SESSION["username"]=$busername;
                    header("location: pre_admin.php");
                }
            }
        }  
        if($bfk_id_estado!="1"){
            $contador+=1;
            header("location: pre_login.php?error=error2");
        }
        if($contador=="0"){
            header("location: pre_login.php?error=error");
        }
    }
}
$cod = new login();
$cod-> evaluar_sesion($_POST["usuario"],$_POST["password"]);


?>