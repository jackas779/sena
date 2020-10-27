<?php
include("seguridad_admin.php")
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <script src="../js/funciones.js"></script>

</head>

<body>
  <div id="banner">
    <?php
    include("banner_admin.php");
    ?>
  </div>
  <div id="col1">

  </div>
  <div id="body" align="center">
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
    <table>
      <tr>
        <td colspan="2">Id_marca</td>
        <td>Nombre</td>
        <td>Estado</td>
        <td>Fecha de Creaci&oacute;n</td>
        <td>Fecha de Modificaci&oacuten</td>
        <td>Usuario Creador</td>
        <td>Usuario Modificador</td>
        <td colspan="3">Acciones</td>
        <td><button type="submit"><i class="fas fa-plus"></i><a href="pre_crear_marcas.php">Crear Marcas</a></button></td>
      </tr>
      <?php
      include("conexion.php");
      $consulta = "SELECT * FROM marcas";
      if (!$resultado = $db->query($consulta)) {
        die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
      }
      while ($fila = $resultado->fetch_assoc()) {
        $bid_marca = stripslashes($fila['id_marca']);
        $bnombre = stripslashes($fila['nombre']);
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
      }

      ?>
    </table>
    <!-- Modal eliminacion de categorias -->
    <div class="modal fade" id="eliminar_marca" tabindex="-1" aria-labelledby="eliminar_marcaLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="eliminar_marcaLabel">Eliminar Categoria</h5>
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
              $('#nombre_mar').val(info.nombre);
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


</body>

</html>