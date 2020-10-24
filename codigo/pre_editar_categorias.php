<?php
include("seguridad_admin.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div id="banner">
    <?php
    include("banner_admin.php");
    ?>
   </div>
   <div  id="col1">

   </div>
   <div id="body">

    <?php

 
    function edit(){
     @$error=$_POST["categoria"]; 
     include("conexion.php");
     $consulta="SELECT * FROM categorias WHERE id_categorias='$error'";
     if(!$resultado=$db->query($consulta)){
        die ('hay un error con la consulta o los datos no existen vuelve a comprobar !!!['. $db->error .']');
     }
     while($fila=$resultado->fetch_assoc()){
        $bcodigo_categoria=stripslashes($fila['codigo_categoria']);
        $bdescripcion=stripslashes($fila['descripcion']);
        $arr=[$bcodigo_categoria,$bdescripcion];
     }   
     return $arr;
    }
    list($codigo,$nombre)=edit();
    ?>

       <form action="neg_dat_editar_categorias.php" method="post" id="editar2" name="editar2">
           <input type="hidden" value="<?php echo $codigo; ?>" id="codigo" name="codigo">
           <input type="text" disabled value="<?php echo $codigo; ?>">Codigo <br><br>
           <input type="text" id="descripcion" name="descripcion" value="<?php echo $nombre; ?>">Descripcion <br><br>
           <input type="submit" value="Editar">
       </form>
   </div>
   <div id="footer">

   </div>
</body>
</html>