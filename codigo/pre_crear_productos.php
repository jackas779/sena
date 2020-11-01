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
                if(isset($_SESSION['status'])!='')
                {
                      ?>
                      
                        <div class="]
                            alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?php echo $_SESSION['status']; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
    ?>
       <form action="neg_dat_crear_productos.php" method="post" autocomplete="off" name="crear_productos" align="center">
        <input type="text" id="codigo" name="codigo" required> codigo <br><br>
        <input type="text" id="nombre" name="nombre" required> nombre <br><br>
        <input type="text" id="descripcion" name="descripcion" required> descripcion <br><br>
        <input type="text" id="existencia" name="existencia" required  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" > existencia <br><br>
        <input type="hidden" id="usuario" name="usuario" value="<?php echo $user=$_SESSION['username'];?>" >
        <!-- select de categorias -->
        <label for="categorias">Categorias</label>
        <select name="categoria" id="categoria" required>
            <option value="" >Seleccione:</option>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM categorias";
                if(!$result=$db->query($sql)){
                    die ('hay un error en la base de datos o no existen los datos ['.$db->error.']');
                }
                while($fila=$result->fetch_assoc()){
                    $bcat_descripcion=stripslashes($fila['cat_descripcion']);
                    $bid_categoria=stripslashes($fila['id_categorias']);
                    echo " <option value='$bid_categoria'>$bcat_descripcion</option>";
                }

            ?>
        </select> <br> <br>
        <!-- select de proveedores -->
        <label for="proveedores">Provedores</label>
        <select name="proveedores" id="proveedores" required>
            <option value="" >Seleccione:</option>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM proveedores";
                if(!$result=$db->query($sql)){
                    die ('hay un error en la base de datos o no existen los datos ['.$db->error.']');
                }
                while($fila=$result->fetch_assoc()){
                    $bnombre_prov=stripslashes($fila['nombre_prov']);
                    $bid_proveedor=stripslashes($fila['id_proveedor']);
                    echo " <option value='$bid_proveedor'>$bnombre_prov</option>";
                }

            ?>
        </select> <br> <br>
            <!-- select de marcas -->
            <label for="marcas">Marcas</label>
        <select name="marcas" id="marcas" required>
            <option value="" >Seleccione:</option>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM marcas";
                if(!$result=$db->query($sql)){
                    die ('hay un error en la base de datos o no existen los datos ['.$db->error.']');
                }
                while($fila=$result->fetch_assoc()){
                    $bnombre_marca=stripslashes($fila['nombre_marca']);
                    $bid_marca=stripslashes($fila['id_marca']);
                    echo " <option value='$bid_marca'>$bnombre_marca</option>";
                }

            ?>
        </select> <br> <br>

        <input type="submit" value="Crear Producto">

       </form>
   </div>
   <div id="footer">

   </div>
</body>
</html>
