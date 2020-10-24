<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <div id="banner" >
   <?php
    include("banner.php");
    ?>
   </div>

   <div id="col1">

   </div>

   <div id="body">
        <form action="neg_dat_registrar.php" method="post" id="registro" name="registro" autocomplete="off">
        <input type="text" id="nombres" name="nombres" required> Nombres <br> <br>
        <input type="text" id="apellidos" name="apellidos" required> Apellidos <br> <br>
        <input type="text" id="usuario" name="usuario" required> Nombre de Usuario <br> <br>
        <input type="email" id="email" name="email" required> Correo Electronico <br> <br>
        <input type="text" id="password" name="password" required> Contraseña <br> <br>
        <input type="text" id="rpassword" name="rpassword" required> Confirmar Contraseña<br> <br>
        <input type="hidden" id="id_estado" name="id_estado" value="1">
        <input type="submit" value="Ingresar">
        </form>
   </div>
   <div id="footer">

   </div>
</body>
</html>