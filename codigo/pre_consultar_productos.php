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
    <table>
    <tr>
        <td>Codigo</td>
        <td>Nombre</td>
        <td>Estado</td>
        <td>Descripci&oacute;n</td>
        <td>Fecha de Creaci&oacute;n</td>
        <td>Usuario Creador</td>
        <td>categoria</td>
        <td colspan="3">Acciones</td>
        <td><button type="submit"><i class="fas fa-plus"></i><a href="pre_crear_productos.php">Crear Categorias</a></button></td>
    </tr>
    <?php
    include("conexion.php");
    $consulta="SELECT P.codigo,P.nombre,P.descripcion,P.fecha_creacion,P.usuario_creacion,P.fk_id_categoria,
                      P.fk_id_estado,P.id_product,
                      C.id_categorias,C.cat_descripcion,
                      E.id_estado,E.nombre_estado
                      FROM productos P 
                      INNER JOIN categorias C
                      ON P.fk_id_categoria = C.id_categorias
                      INNER JOIN estados E 
                      ON P.fk_id_estado = id_estado";
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
        echo "<tr>";
        echo "<td class='id_cat'>$bcodigo</td>";
        echo "<td>$bnombre</td>";
        echo "<td>$bfk_id_estado</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bfecha_creacion</td>";
        echo "<td>$busuario_creacion</td>";
        echo "<td>$bfk_id_categoria</td>";
        ?>
        <td>
            <a href="#" class="badge badge-info act_btn" cat="<?php echo $bid_product; ?>"><i class="fas fa-feather"></i></a>
        </td>
        <td>
            <a href="#" class="badge badge-danger delete_btn"><i class="fas fa-trash-alt"></i></a>
        </td>
        <?php
        if($bfk_id_estado=="activo"){
            echo "<td><a href='neg_cambiar_estado_cat.php?id=$bid_product'><i class='fas fa-check text-success'></i></a></td>";   
        }
        if($bfk_id_estado=="inactivo"){
            echo "<td><a href='neg_cambiar_estado_cat.php?id=$bid_product'><i class='fas fa-times-circle text-danger'></i></a></td>";   
        }
       
        echo "</tr>";
    }

    ?>
 </table>
    <!-- Modal eliminacion de proveedores -->
<div class="modal fade" id="eliminar_proveedor" tabindex="-1" aria-labelledby="eliminar_proveedorLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminar_proveedorLabel">Eliminar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="neg_dat_eliminar_proveedor.php" method="POST">
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

<!-- Modal editar proveedores -->

<div class="modal fade" id="editar_prov" tabindex="-1" role="dialog" aria-labelledby="editar_provLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editar_provLabel">Editar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="neg_dat_editar_proveedores.php" method="post">
      <div class="modal-body">   
          
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id producto:</label>
            <input type="hidden" name="id_prov"  id="cod_proveedor">
            <input type="text" class="form-control proveedor" id="cod" disabled>
          </div>
          
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_prov" name="nombre">
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Direcci&oacuten:</label>
            <input type="text" class="form-control" id="direccion_prov" name="direccion">
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono_prov" name="telefono">
          </div>
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Correo Electronico:</label>
            <input type="text" class="form-control" id="email_prov" name="email">
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
<!-- Modal editar proveedores -->
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
            <input type="hidden" name="id_prov"  id="cod_proveedor">
            <input type="text" class="form-control proveedor" id="cod" disabled>
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombre_det" >
            <label for="recipient-name" class="col-form-label">Direcci&oacute;n:</label>
            <input type="text" class="form-control" id="direccion_det" >
            <label for="recipient-name" class="col-form-label">Telefono:</label>
            <input type="text" class="form-control" id="telefono_det" >
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" id="email_det" >
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
</div>
   <div id="footer">

   </div>
<script>
    $(document).ready(function(){

//scrip editar proveedores
$('.act_btn').click(function(e){
    e.preventDefault();
    var proveedor = $(this).attr('prov');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "edit_prov_ajax.php",
        data: {actt:action,prov:proveedor},
        async:true,
        success: function (response) {
            if(response !='error'){
                $('#editar_prov').modal('show');
                var info = JSON.parse(response);
                $('#cod_proveedor').val(info.id_proveedor);
                $('.proveedor').val(info.id_proveedor);
                $('#nombre_prov').val(info.nombre);
                $('#direccion_prov').val(info.direccion);
                $('#telefono_prov').val(info.telefono);
                $('#email_prov').val(info.email);              

            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        },
    });
    
});
//modal confirmacion eliminar proveedores
$('.delete_btn').click(function (e) { 
    e.preventDefault();

    var id_prov = $(this).closest('tr').find('.id_prov').text();
    //console.log(id_cat);
    $('#cod_id').val(id_prov);
    $('#eliminar_proveedor').modal('show');
});
// Funcion del modal de detalles
$('.info_btn').click(function(e){
    e.preventDefault();
    var proveedor = $(this).attr('prov');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "det_prov_ajax.php",
        data: {actt:action,prov:proveedor},
        async:true,
        success: function (response) {
            if(response !='error'){
                var info = JSON.parse(response);
                $('#cod_proveedor').val(info.id_proveedor);
                $('.proveedor').val(info.id_proveedor);
                $('#nombre_det').val(info.nombre);
                $('#direccion_det').val(info.direccion);
                $('#telefono_det').val(info.telefono);
                $('#fecha_cre_det').val(info.fecha_creacion);
                $('#fecha_mod_det').val(info.fecha_modificacion);
                $('#usuario_cre_det').val(info.usuario_creacion);
                $('#usuario_mod_det').val(info.usuario_modificacion);
                $('#email_det').val(info.email);
                console.log(info);

               

            }
            if(response =='error'){
                alert("categoria inactiva");
            }
        },
        error:function(error){
            console.log(error);
        },
    });
    $('#exampleModalLong').modal('show');
    
});
});
</script>


</body>
</html>
