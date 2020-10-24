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
   <div  id="col1">

   </div>
   <div id="body" align="center">
    <table>
    <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Estado</td>
        <td>Fecha de Creaci&oacute;n</td>
        <td>Fecha de Modificaci&oacuten</td>
        <td>Usuario Creador</td>
        <td>Usuario Modificador</td>
        <td colspan="3">Acciones</td>
        <td><button type="submit"><i class="fas fa-plus"></i><a href="pre_crear_categorias.php">Crear Categorias</a></button></td>
    </tr>
    <?php
    include("conexion.php");
    $consulta="SELECT * FROM categorias";
    if(!$resultado=$db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }
    while($fila=$resultado->fetch_assoc()){
        $bcodigo=stripslashes($fila['codigo_categoria']);
        $bdescripcion=stripslashes($fila['descripcion']);
        $bfecha_creacion=stripslashes($fila['fecha_creacion']);
        $bfecha_modificacion=stripslashes($fila['fecha_modificacion']);
        $busuario_modificacion=stripslashes($fila['usuario_modificacion']);
        $busuario_creacion=stripslashes($fila['usuario_creacion']);
        $bfk_id_estado=stripslashes($fila['fk_id_estado']);
        $bid_categorias=stripslashes($fila['id_categorias']);

        if($bfk_id_estado=="1"){
            $bfk_id_estado='activo';
        }
        if($bfk_id_estado=="2"){
            $bfk_id_estado='inactivo';
        }
        if($bfecha_modificacion==""){
            $bfecha_modificacion="---------------------";
        }
        if($busuario_modificacion==""){
            $busuario_modificacion="--------------------";
        }
        echo "<tr>";
        echo "<td class='id_cat'>$bcodigo</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bfk_id_estado</td>";
        echo "<td>$bfecha_creacion</td>";
        echo "<td>$bfecha_modificacion</td>";
        echo "<td>$busuario_creacion</td>";
        echo "<td>$busuario_modificacion</td>";
        ?>
        <td>
            <a href="#" class="badge badge-info act_btn" cat="<?php echo $bid_categorias; ?>"><i class="fas fa-feather"></i></a>
        </td>
        <td>
            <a href="#" class="badge badge-danger delete_btn"><i class="fas fa-trash-alt"></i></a>
        </td>
        <?php
        if($bfk_id_estado=="activo"){
            echo "<td><a href='neg_cambiar_estado_cat.php?id=$bid_categorias'><i class='fas fa-check text-success'></i></a></td>";   
        }
        if($bfk_id_estado=="inactivo"){
            echo "<td><a href='neg_cambiar_estado_cat.php?id=$bid_categorias'><i class='fas fa-times-circle text-danger'></i></a></td>";   
        }
       
        echo "</tr>";
    }

    ?>
 </table>
   <!-- Modal eliminacion de categorias -->
<div class="modal fade" id="eliminar_categoria" tabindex="-1" aria-labelledby="eliminar_categoriaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminar_categoriaLabel">Eliminar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="neg_dat_eliminar_categorias.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id_cod" id="cod_id">
                <h4>¿Estas Seguro de eliminar esta categoria ?</h4>
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

<!-- Modal editar categorias -->

<div class="modal fade" id="editar_cat" tabindex="-1" role="dialog" aria-labelledby="editar_catLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editar_catLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="neg_dat_editar_categorias.php" method="post">
      <div class="modal-body">   
          
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cod_producto:</label>
            <input type="hidden" name="codigo"  id="cod_categoria">
            <input type="text" class="form-control categorias" id="cod" disabled>
          </div>
          
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_cate" name="descripcion">
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
<!-- Modal editar categorias -->

</div>
   <div id="footer">

   </div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script>
    $(document).ready(function(){

//modal actualizar categorias
$('.act_btn').click(function(e){
    e.preventDefault();
    var categoria = $(this).attr('cat');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "edit_cat_ajax.php",
        data: {actt:action,cate:categoria},
        async:true,
        success: function (response) {
            if(response !='error'){
                var info = JSON.parse(response);

                $('#cod_categoria').val(info.codigo_categoria);
                $('.categorias').val(info.codigo_categoria);
                $('#nombre_cate').val(info.descripcion);
                $('#editar_cat').modal('show');

            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        }
    });
    
});
//modal confirmacion eliminar categorias
$('.delete_btn').click(function (e) { 
    e.preventDefault();

    var id_cat = $(this).closest('tr').find('.id_cat').text();
    //console.log(id_cat);
    $('#cod_id').val(id_cat);
    $('#eliminar_categoria').modal('show');
});
});
</script>


</body>
</html>
