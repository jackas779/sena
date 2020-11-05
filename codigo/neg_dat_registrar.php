<?php
class registro{
    public function registrar($nombres,$apellidos,$usuario,$email,$password,$rpassword,$id_estado){
        include("conexion.php");   
        $contador="0";
        $consulta= "SELECT * FROM usuarios WHERE username='$usuario' OR email='$email'";
        if(!$resultado = $db->query($consulta)){
            die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
            }// la consulta
        while($fila=$resultado->fetch_assoc()){
            $busername=stripslashes($fila['username']);
            $bemail=stripslashes($fila['email']);
            $contador+=1;
            if($busername==$usuario){
                echo "EL NOMBRE ",$busername, "  ya esta en uso<br>";
            }
            if($bemail==$email){
                echo $bemail, "ESTE CORREO ELECTRONICO ya esta en uso<br>";
            }
        }  
        if($nombres==""){
            echo "Esta vacio el nombre";
            echo "<br>";
        }
        if($apellidos==""){
            echo "Esta vacio el apellido";
            echo "<br>";
        }
        if($usuario==""){
            echo "Esta vacio el usuario";
            echo "<br>";
        }
        if($email==""){
            echo "Esta vacio el email";
            echo "<br>";
        }
        if($password=="" || $rpassword==""){
            echo "Esta vacio la contrase&ntildea";
            echo "<br>";
        }
        if($password==$rpassword){
            if($contador=="0"){
                mysqli_query($db,"INSERT INTO usuarios (id_usuario,username,nombres,apellidos,email,password,fk_id_estado) VALUES (NULL,'$usuario','$nombres','$apellidos','$email','$password','$id_estado')") or die (mysqli_error($db));
                
                header("location: pre_login.php");
            }  
        }
        if($password!=$rpassword){
            echo "incorrecto";
            echo "<br>";    
            header("location: pre_registro.php");
        }
    }
}
$cod = new registro();
$cod-> registrar($_POST["nombres"],$_POST["apellidos"],$_POST["usuario"],$_POST["email"],$_POST["password"],$_POST["rpassword"],$_POST["id_estado"]);
?>