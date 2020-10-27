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
       <form action="neg_dat_crear_proveedores.php" method="post" autocomplete="off" name="crear_categorias" align="center">
        <input type="text" id="nombre" name="nombre" required> Nombre <br><br>
        <input type="text" id="direccion" name="direccion" required> Direcci&oacute;n<br><br>
        <input type="text" id="telefono" name="telefono" required> telefono<br><br>
        <input type="email" id="email" name="email" required> Correo Electronico<br><br>
        <input type="hidden" id="usuario" name="usuario" value="<?php echo $user=$_SESSION['username'];?>" >
        <input type="submit">

       </form>
   </div>
   <div id="footer">

   </div>
</body>
</html>
