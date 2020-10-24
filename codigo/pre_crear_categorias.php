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
       <form action="neg_dat_crear_categorias.php" method="post" autocomplete="off" name="crear_categorias" align="center">
        <input type="text" id="codigo" name="codigo"> codigo <br><br>
        <input type="text" id="nombre" name="nombre"> nombre <br><br>
        <input type="hidden" id="usuario" name="usuario" value="<?php echo $user=$_SESSION['username'];?>" >
        <input type="submit">

       </form>
   </div>
   <div id="footer">

   </div>
</body>
</html>
