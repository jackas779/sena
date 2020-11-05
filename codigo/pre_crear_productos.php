<?php
include("seguridad_admin.php")
?>


<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- icono del title-->
  <link rel="shortcut icon"  href="https://genfavicon.com/tmp/icon_a561d8beb6b4c18e363a5b078ba0f316.ico" type="image/x-icon">

  <title>Crear Productos</title>


    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

<!-- Custom styles for this template -->

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

<link href="../css/resume.min.css" rel="stylesheet">
<script src="../js/funciones.js"></script>
</head>
<body>

    <!-- llamado de la columna -->
    <?php

      include("../menu_admin/columna.php");



    ?>

    <!-- llamado del banner -->

<?php

include("../menu_admin/banner.php");



?>

</div>

  <!-- Inicio del cuerpo con su tarjeta-->



<div class="card">

</div>

    <div class="card shadow mb-4">
            <div class="card-header py-3">
                    <h3 class="m-0 font-weight-bold" style="color: black;">Crear Productos</h3>
                    <hr>

                    <br>


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
       <form action="neg_dat_crear_productos.php" method="post" autocomplete="off" name="crear_productos" >
       <div align="center" >

        <!-- select de categorias -->
        <label for="categorias"><b> Categorias</b></label>
        <select class='form-control w-25' name="categoria" id="categoria" required>
            <option class='form-control w-25' value="" >Seleccione:</option>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM categorias";
                if(!$result=$db->query($sql)){
                    die ('hay un error en la base de datos o no existen los datos ['.$db->error.']');
                }
                while($fila=$result->fetch_assoc()){
                    $bcat_descripcion=stripslashes($fila['cat_descripcion']);
                    $bid_categoria=stripslashes($fila['id_categorias']);
                    echo " <option class='form-control w-25' value='$bid_categoria'>$bcat_descripcion</option>";
                }

            ?>
        </select> <hr class="w-25">
        <!-- select de proveedores -->
        <label for="proveedores"><b> Provedores</b></label>
        <select class='form-control w-25' name="proveedores" id="proveedores" required>
            <option class='form-control w-25' value="" >Seleccione:</option>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM proveedores";
                if(!$result=$db->query($sql)){
                    die ('hay un error en la base de datos o no existen los datos ['.$db->error.']');
                }
                while($fila=$result->fetch_assoc()){
                    $bnombre_prov=stripslashes($fila['nombre_prov']);
                    $bid_proveedor=stripslashes($fila['id_proveedor']);
                    echo " <option class='form-control w-25' value='$bid_proveedor'>$bnombre_prov</option>";
                }

            ?>
        </select> <hr class="w-25">
            <!-- select de marcas -->
            <label for="marcas"><b> Marcas</b></label>
        <select class='form-control w-25' name="marcas" id="marcas" required>
            <option class='form-control w-25' value="" >Seleccione:</option>
            <?php
                include("conexion.php");
                $sql="SELECT * FROM marcas";
                if(!$result=$db->query($sql)){
                    die ('hay un error en la base de datos o no existen los datos ['.$db->error.']');
                }
                while($fila=$result->fetch_assoc()){
                    $bnombre_marca=stripslashes($fila['nombre_marca']);
                    $bid_marca=stripslashes($fila['id_marca']);
                    echo " <option class='form-control w-25' value='$bid_marca'>$bnombre_marca</option>";
                }
                
            ?>
        </select> <hr class="w-25">




<div class="form-group w-25">
      <input type="text"  class="form-control form-control-user" id="codigo" name="codigo" required placeholder="Codigo">
</div>
<hr class="w-25">
<div class="form-group w-25">
      <input type="text"  class="form-control form-control-user" id="nombre" name="nombre" required placeholder="Nombre">
</div>
<hr class="w-25"> 
<div class="form-group w-25">
      <input type="text"  class="form-control form-control-user" id="descripcion" name="descripcion" required placeholder="Descripci&oacute;n">
</div>
<hr class="w-25">
<div class="form-group w-25">
      <input  class="form-control form-control-user" id="existencia" name="existencia" required  onkeypress="if ( isNaN( String.fromCharCode(event.keyCode) )) return false;" placeholder="Existencia">
</div>
<input type="hidden" id="usuario" name="usuario" value="<?php echo $user=$_SESSION['username'];?>" >       



<button type="submit" value="Crear Producto" class="btn btn-outline-warning btn-sm"><i class="fas fa-plus"></i>
<span class="text-dark"> <b> Crear Producto</b></span></a></button>
       
   </div>
</div>







</form>
</div>


 

  






  
</div>
      </div>
  <!-- Fin del cuerpo con su tarjeta-->


<div class="d-flex">
  footer
</div>

<!-- Bootstrap core JavaScript -->

<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Plugin JavaScript -->



<!-- Custom scripts for this template -->
<script src="../js/resume.min.js"></script>

</body>

</html>