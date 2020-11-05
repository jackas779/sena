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

  <title>Productos</title>


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
<body >

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
                    <h3 class="m-0 font-weight-bold" style="color: black;">Productos Disponibles</h3>
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
    <table class=" table-ligth table-hover table-bordered " width="100%" >

                  
<thead style="background-color: black;" class="text-light" >

    <tr align="center" >
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Descripci&oacute;n</th>
        <th>Existencia</th>
        <th>Fecha de Creaci&oacute;n</th>
        <th>Usuario Creador</th>
        <th>Categoria</th>
        <th>Estado</th>
        <th colspan="6">Acciones</th>
 
    </tr>
</thead>
    <?php
    include("conexion.php");
    $consulta="SELECT P.codigo,P.nombre,P.descripcion,P.fecha_creacion,P.usuario_creacion,P.fk_id_categoria,
                      P.fk_id_estado,P.id_product,P.existencia,
                      C.id_categorias,C.cat_descripcion,
                      E.id_estado,E.nombre_estado
                      FROM productos P 
                      INNER JOIN categorias C
                      ON P.fk_id_categoria = C.id_categorias
                      INNER JOIN estados E 
                      ON P.fk_id_estado = E.id_estado";
    if(!$resultado=$db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }
    while($fila=$resultado->fetch_assoc()){
        $bcodigo=stripslashes($fila['codigo']);
        $bnombre=stripslashes($fila['nombre']);
        $bdescripcion=stripslashes($fila['descripcion']);
        $bfecha_creacion=stripslashes($fila['fecha_creacion']);
        $busuario_creacion=stripslashes($fila['usuario_creacion']);
        $bfk_id_categoria=stripslashes($fila['cat_descripcion']);
        $bfk_id_estado=stripslashes($fila['nombre_estado']);
        $bid_product=stripslashes($fila['id_product']);
        $bexistencia=stripslashes($fila['existencia']);
        echo "<tbody align='center'>";
        echo "<tr>";
        echo "<td class='id_prod'>$bcodigo</td>";
        echo "<td>$bnombre</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bexistencia</td>";
        echo "<td>$bfecha_creacion</td>";
        echo "<td>$busuario_creacion</td>";
        echo "<td>$bfk_id_categoria</td>";
        echo "<td>$bfk_id_estado</td>";
        $pesos="<p id='prueba'><p>";
        ?>
        <td>
            <a href="#" class="badge badge-info act_btn" prod="<?php echo $bid_product; ?>"><i class="fas fa-feather"></i></a>
        </td>
        <td>
            <a href="#" class="badge badge-danger delete_btn"><i class="fas fa-trash-alt"></i></a>
        </td>
        <td>
        <a href="#" class="badge badge-warning info_btn" prod="<?php echo $bid_product;?>">Detalles</a>
        </td>
        <td>
        <a href="#" class="badge badge-success add_btn" prod="<?php echo $bid_product;?>">Agregar</a>
        </td>
        <td>
        <a href="#" class="badge badge-danger obs_btn" prod="<?php echo $bid_product;?>">Obsoleto</a>
        </td>
        <?php
        if($bfk_id_estado=="activo"){
            echo "<td><a href='neg_cambiar_estado_prod.php?id=$bid_product'><i class='fas fa-check text-success'></i></a></td>";   
        }
        if($bfk_id_estado=="inactivo"){
            echo "<td><a href='neg_cambiar_estado_prod.php?id=$bid_product'><i class='fas fa-times-circle text-danger'></i></a></td>";   
        }
       
        echo "</tr>";
        echo "</tbody>";
    }

    ?>
 </table>

 <hr>
 <div align="center">
 <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-plus"></i><a href="pre_crear_productos.php" style="   text-decoration: none;">
   <span class="text-dark"> <b> Crear Productos</b></span></a></button>
 </div>

   <!-- Modal eliminacion de proveedores -->
<div class="modal fade" id="eliminar_producto" tabindex="-1" aria-labelledby="eliminar_productoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminar_productoLabel">Eliminar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="neg_dat_eliminar_producto.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id" id="cod_id">
                <h4>¿Estas Seguro de eliminar este proveedor ?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" name="but_eliminar" class="btn btn-danger">Si,eliminar</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- Modal eliminacion de proveedores -->

<!-- Modal editar productos -->

<div class="modal fade" id="editar_prod" tabindex="-1" role="dialog" aria-labelledby="editar_prodLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editar_prodLabel">Editar Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="neg_dat_editar_productos.php" method="post">
      <div class="modal-body">   
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id producto:</label>
            <input type="hidden" name="id"  id="id_producto">
            <input type="text" class="form-control producto" id="cod" disabled>
          </div>
          
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="codigo_prod" name="codigo">
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_prod" name="nombre">
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripci&oacute;n:</label>
            <input type="text" class="form-control" id="descripcion_prod" name="descripcion">
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <select  name="categorias" class="form-control" required>
              <option  id="categoria_prod">Seleccione :</option>
              <?php 
              $sql = "SELECT * FROM categorias";
              if(!$resultado=$db->query($sql)){
                die ('hay un error ['.$db->error.']');
              }
              while($row=$resultado->fetch_assoc()){
                $bid_categorias = stripcslashes($row['id_categorias']);
                $bcat_descripcion = stripcslashes($row['cat_descripcion']);
                echo "<option value='$bid_categorias'>$bcat_descripcion</option>";
              }
              ?>
            </select>
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Proveedor:</label>
            <select  class="form-control" name="proveedores" required>
              <option  id="proveedor_prod">Seleccione :</option>
              <?php 
              $sql = "SELECT * FROM proveedores";
              if(!$resultado=$db->query($sql)){
                die ('hay un error ['.$db->error.']');
              }
              while($row=$resultado->fetch_assoc()){
                $bid_proveedor = stripcslashes($row['id_proveedor']);
                $bnombre_prov = stripcslashes($row['nombre_prov']);
                echo "<option value='$bid_proveedor'>$bnombre_prov</option>";
              }
              ?>
            </select>
          </div>
     <div class="form-group">
            <label for="recipient-name" class="col-form-label">Marca:</label>
            <select  class="form-control" name="marcas" required>
              <option   id="marca_prod">Seleccione :</option>
              <?php 
              $sql = "SELECT * FROM marcas";
              if(!$resultado=$db->query($sql)){
                die ('hay un error ['.$db->error.']');
              }
              while($row=$resultado->fetch_assoc()){
                $bid_marca = stripcslashes($row['id_marca']);
                $bnombre_marca = stripcslashes($row['nombre_marca']);
                echo "<option value='$bid_marca'>$bnombre_marca</option>";
              }
              ?>
            </select>
          </div>    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Actualizar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal editar productos -->

<!-- Modal detalles proveedores-->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Detalles</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="">
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id producto:</label>
            <input type="hidden" name="id_prod"  id="id_prod_det">
            <input type="text" class="form-control proveedor" id="cod_det" disabled>
            <label for="recipient-name" class="col-form-label">Codigo:</label>
            <input type="text" class="form-control" id="codigo" >
            <label for="recipient-name" class="col-form-label">Codigo de barra:</label>
            <input type="text" class="form-control" id="codigo_barras" >
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_det" >
            <label for="recipient-name" class="col-form-label">Descripci&oacute;n:</label>
            <input type="text" class="form-control" id="descripcion_det" >
            <label for="recipient-name" class="col-form-label">Existencia:</label>
            <input type="text" class="form-control" id="existencia_det" >
            <label for="recipient-name" class="col-form-label">Categoria:</label>
            <input type="text" class="form-control" id="categoria_det" >
            <label for="recipient-name" class="col-form-label">Marca:</label>
            <input type="text" class="form-control" id="marca_det" >
            <label for="recipient-name" class="col-form-label">Proveedor:</label>
            <input type="text" class="form-control" id="proveedor_det" >
            <label for="recipient-name" class="col-form-label">Fecha de creacion:</label>
            <input type="text" class="form-control" id="fecha_cre_det" >
            <label for="recipient-name" class="col-form-label">Usuario creador:</label>
            <input type="text" class="form-control" id="usuario_cre_det" >
            <label for="recipient-name" class="col-form-label">Fecha modificaci&oacute;n:</label>
            <input type="text" class="form-control" id="fecha_mod_det" >
            <label for="recipient-name" class="col-form-label">Uusario modificador:</label>
            <input type="text" class="form-control" id="usuario_mod_det" >
          </div>
          </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal detalles proveedores-->

<!-- Modal agregar existencias -->
<div class="modal fade" id="existencias_modal" tabindex="-1" aria-labelledby="existencias_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="existencias_modalLabel">Agregar Existencias</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="neg_dat_agregar_existencias.php" method="post">
      <div class="modal-body">
            <label for="recipient-name" class="col-form-label">Producto:</label>
            <input type="hidden" class="form-control" id="id" name="product" >
            <input type="text" class="form-control" id="id_product"  disabled>
            <label for="recipient-name" class="col-form-label">Existencia Actual:</label>
            <input type="number" class="form-control" id="exis" disabled >
            <label for="recipient-name" class="col-form-label">Agregar existencias:</label>
            <input type="number" class="form-control" value="0" name="existencia" >
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--fin del modal -->
<!-- Modal agregar existencias -->
<div class="modal fade" id="obsoletos_modal" tabindex="-1" aria-labelledby="obsoletos_modalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="obsoletos_modalLabel">Productos Obsoletos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="neg_dat_obsoletos.php" method="post">
      <div class="modal-body">
            <label for="recipient-name" class="col-form-label">Producto:</label>
            <input type="hidden" class="form-control" id="id_prod" name="product" >
            <input type="hidden" class="form-control" id="cod_pr" name="codigo" >
            <input type="hidden" class="form-control" id="nom_pr" name="nombre" >
            <input type="text" class="form-control" id="id_pro"  disabled>
            <label for="recipient-name" class="col-form-label">Existencia Actual:</label>
            <input type="text" class="form-control" id="exist" disabled >
            <label for="recipient-name" class="col-form-label">Agregar productos obsoletos:</label>
            <input type="number" class="form-control" value="0" name="obsoletos" >
            <div class="form-group">
            <label for="message-text" class="col-form-label">Observaciones:</label>
            <textarea class="form-control" id="message-text" name="mensajes" required></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Aceptar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!--fin del modal -->
</div>
   <div id="footer">

   </div>
<?php
include("java_productos.php");
?>


 

 

  






  
</div>
      </div>
  <!-- Fin del cuerpo con su tarjeta-->


<div class="d-flex">

</div>

<!-- Bootstrap core JavaScript -->

<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Plugin JavaScript -->



<!-- Custom scripts for this template -->
<script src="../js/resume.min.js"></script>

</body>

</html>