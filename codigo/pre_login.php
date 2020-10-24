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
        <?php
            if(isset($_GET['error'])){
                $var=$_GET['error'];
                if($var=="error"){
                    echo "<p style='color:red'>usuario o contraseña incorrectos</p>";
                }
            }
        ?>
        <form action="neg_login.php" method="post" id="login" name="login" autocomplete="off">
        <input type="text" id="usuario" name="usuario" required> Usuario <br> <br>
        <input type="password" id="password" name="password" required> Contraseña <br> <br>
        <input type="submit" value="Ingresar">
        </form>
   </div>
   <div id="footer">

   </div>
</body>
</html>