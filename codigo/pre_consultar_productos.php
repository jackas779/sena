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
    <link rel="shortcut icon"  href="https://genfavicon.com/tmp/icon_a561d8beb6b4c18e363a5b078ba0f316.ico" type="image/x-icon">
    
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
        <td><button type="submit"><i class="fas fa-plus"></i><a href="pre_crear_productos.php">Crear Productos</a></button></td>
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
        echo "<tr>";
        echo "<td class='id_prod'>$bcodigo</td>";
        echo "<td>$bnombre</td>";
        echo "<td>$bfk_id_estado</td>";
        echo "<td>$bdescripcion</td>";
        echo "<td>$bfecha_creacion</td>";
        echo "<td>$busuario_creacion</td>";
        echo "<td>$bfk_id_categoria</td>";
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
        <?php
        if($bfk_id_estado=="activo"){
            echo "<td><a href='neg_cambiar_estado_prod.php?id=$bid_product'><i class='fas fa-check text-success'></i></a></td>";   
        }
        if($bfk_id_estado=="inactivo"){
            echo "<td><a href='neg_cambiar_estado_prod.php?id=$bid_product'><i class='fas fa-times-circle text-danger'></i></a></td>";   
        }
       
        echo "</tr>";
    }

    ?>
 </table>
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
      <form action="neg_dat_editar_proveedores.php" method="post">
      <div class="modal-body">   
          
      <div class="form-group">
            <label for="recipient-name" class="col-form-label">Id producto:</label>
            <input type="hidden" name="id_prod"  id="id_producto">
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
            <select  name="categorias" class="form-control">
              <option label="" id="categoria_prod"></option>
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
            <input type="text" class="form-control" id="proveedor_prod" name="proveedores">
          </div>
     <div class="form-group">
            <label for="recipient-name" class="col-form-label">Marca:</label>
            <input type="text" class="form-control" id="marca_prod" name="marcas">
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
</div>
   <div id="footer">

   </div>
<script>
  //scrip editar proveedores
$(document).ready(function(){
  $('.act_btn').click(function(e){
    e.preventDefault();
    var producto = $(this).attr('prod');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "edit_prod_ajax.php",
        data: {actt:action,prov:producto},
        async:true,
        success: function (response) {
            if(response !='error'){
                $('#editar_prod').modal('show');
                var info = JSON.parse(response);
                $('#id_prod').val(info.id_product);
                $('#cod').val(info.id_product);
                $('#codigo_prod').val(info.codigo);
                $('#nombre_prod').val(info.nombre);
                $('#descripcion_prod').val(info.descripcion);
                $('#categoria_prod').val(info.cat_descripcion);
                $('#proveedor_prod').val(info.nombre_marca);
                $('#marca_prod').val(info.nombre_prov);  
                $('label').val(info.nombre);            

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

    var id_prod = $(this).closest('tr').find('.id_prod').text();
    $('#cod_id').val(id_prod);
    $('#eliminar_producto').modal('show');
});
// Funcion del modal de detalles
$('.info_btn').click(function(e){
    e.preventDefault();
    var producto = $(this).attr('prod');
    var action = 'infocate';
    $.ajax({
        type: "POST",
        url: "det_prod_ajax.php",
        data: {actt:action,prov:producto},
        async:true,
        success: function (response) {
            if(response !='error'){
                var info = JSON.parse(response);
                $('#id_prod_det').val(info.id_product);
                $('#cod_det').val(info.id_product);
                $('#codigo').val(info.codigo);
                $('#codigo_barras').val();
                $('#nombre_det').val(info.nombre);
                $('#descripcion_det').val(info.descripcion);
                $('#existencia_det').val(info.existencia);
                $('#categoria_det').val(info.cat_descripcion); 
                $('#marca_det').val(info.nombre_marca);
                $('#proveedor_det').val(info.nombre_prov);
                $('#fecha_cre_det').val(info.fecha_creacion);
                $('#usuario_cre_det').val(info.usuario_creacion);       
                $('#fecha_mod_det').val(info.fecha_modificacion); 
                $('#usuario_mod_det').val(info.usuario_modificacion);             

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
