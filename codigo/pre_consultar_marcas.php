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

  <title>marcas</title>


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
                    <h3 class="m-0 font-weight-bold" style="color: black;">marcas disponibles</h3>
                    <hr>

                    <br>

                    <?php
    if (isset($_SESSION['status']) != '') {
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
    <table class="table table-responsive-xl table-bordered  table-ligth table-hover " >

                  
<thead style="background-color: black;" class="text-light" >

    <tr align="center" >
        <th colspan="2">Id_marca</th>
        <th>Nombre</th>
        <th>Estado</th>
        <th>Fecha de Creaci&oacute;n</th>
        <th>Fecha de Modificaci&oacuten</th>
        <th>Usuario Creador</th>
        <th>Usuario Modificador</th>
        <th colspan="3">Acciones</th>
      </tr>
</thead>
      <?php
      include("conexion.php");
      $consulta = "SELECT * FROM marcas";
      if (!$resultado = $db->query($consulta)) {
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
      }
      while ($fila = $resultado->fetch_assoc()) {
        $bid_marca = stripslashes($fila['id_marca']);
        $bnombre = stripslashes($fila['nombre_marca']);
        $bfecha_creacion = stripslashes($fila['fecha_creacion']);
        $bfecha_modificacion = stripslashes($fila['fecha_modificacion']);
        $busuario_modificacion = stripslashes($fila['usuario_modificacion']);
        $busuario_creacion = stripslashes($fila['usuario_creacion']);
        $bfk_id_estado = stripslashes($fila['fk_id_estado']);

        if ($bfk_id_estado == "1") {
          $bfk_id_estado = 'activo';
        }
        if ($bfk_id_estado == "2") {
          $bfk_id_estado = 'inactivo';
        }
        if ($bfecha_modificacion == "") {
          $bfecha_modificacion = "---------------------";
        }
        if ($busuario_modificacion == "") {
          $busuario_modificacion = "--------------------";
        }
        echo "<tbody align='center'>";
        echo "<tr>";
        echo "<td>#</td>";
        echo "<td class='id_mar'>$bid_marca</td>";
        echo "<td>$bnombre</td>";
        echo "<td>$bfk_id_estado</td>";
        echo "<td>$bfecha_creacion</td>";
        echo "<td>$bfecha_modificacion</td>";
        echo "<td>$busuario_creacion</td>";
        echo "<td>$busuario_modificacion</td>";
        
      ?>
        <td>
          <a href="#" class="badge badge-info act_btn" mar="<?php echo $bid_marca; ?>"><i class="fas fa-feather"></i></a>
        </td>
        <td>
          <a href="#" class="badge badge-danger delete_btn"><i class="fas fa-trash-alt"></i></a>
        </td>
      <?php
        if ($bfk_id_estado == "activo") {
          echo "<td><a href='neg_cambiar_estado_marc.php?id=$bid_marca'><i class='fas fa-check text-success'></i></a></td>";
        }
        if ($bfk_id_estado == "inactivo") {
          echo "<td><a href='neg_cambiar_estado_marc.php?id=$bid_marca'><i class='fas fa-times-circle text-danger'></i></a></td>";
        }

        echo "</tr>";
        echo "</tbody>";
      }

      ?>
    </table>

<div align="center">
 <button type="submit" class="btn btn-outline-success btn-sm"><i class="fas fa-plus"></i><a href="pre_crear_marcas.php" style="   text-decoration: none;">
   <span class="text-dark"> <b> Crear Marcas</b></span></a></button>
 </div>
    <!-- Modal eliminacion de categorias -->
    <div class="modal fade" id="eliminar_marca" tabindex="-1" aria-labelledby="eliminar_marcaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminar_marcaLabel">Eliminar Marca</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="neg_dat_eliminar_marca.php" method="POST">
            <div class="modal-body">
              <input type="hidden" name="id_cod" id="cod_id">
              <h4>¿Estas Seguro de eliminar esta marca ?</h4>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="submit" name="but_eliminar" class="btn btn-danger">Si,eliminar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- Modal eliminacion de categorias -->

    <!-- Modal editar marcas -->

    <div class="modal fade" id="editar_marca" tabindex="-1" role="dialog" aria-labelledby="editar_marcaLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editar_marcaLabel">Actualizar Marcas</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="neg_dat_editar_marcas.php" method="post">
            <div class="modal-body">

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Cod_producto:</label>
                <input type="hidden" name="id" id="cod_marca">
                <input type="text" class="form-control marca" id="cod" disabled>
              </div>

              <div class="form-group">
                <label for="recipient-name" class="col-form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre_mar" name="nombre">
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
    <!-- Modal editar marcas -->

  </div>
  <div id="footer">

  </div>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script>
    $(document).ready(function() {

      // funcion del modal actualizar categorias
      $('.act_btn').click(function(e) {
        e.preventDefault();
        var marca = $(this).attr('mar');
        var action = 'infocate';
        $.ajax({
          type: "POST",
          url: "edit_mar_ajax.php",
          data: {
            actt: action,
            mar: marca
          },
          async: true,
          success: function(response) {
            if (response != 'error') {
              var info = JSON.parse(response);

              $('#cod_marca').val(info.id_marca);
              $('.marca').val(info.id_marca);
              $('#nombre_mar').val(info.nombre_marca);
              $('#editar_marca').modal('show');


            }
            if (response == 'error') {
              alert("categoria inactiva");
            }
          },
          error: function(error) {
            console.log(error);
          }
        });
      });
      //modal confirmacion eliminar categorias
      $('.delete_btn').click(function(e) {
        e.preventDefault();

        var id_mar = $(this).closest('tr').find('.id_mar').text();
        //console.log(id_cat);
        $('#cod_id').val(id_mar);
        $('#eliminar_marca').modal('show');
      });
    });
  </script>


 

 

  






  
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