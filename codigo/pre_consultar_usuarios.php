<?php
include("seguridad_admin.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <script src="../js/funciones.js"></script>
    
</head>
<body>
   <div id="banner">
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
        <td>Id Usuario</td>
        <td>Nombre de Usuario</td>
        <td>Estado</td>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Correo electronico</td>
        <td colspan="3">Acciones</td>
    </tr>
    <?php
    include("conexion.php");
    $consulta="SELECT * FROM usuarios";
    if(!$resultado=$db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }
    while($fila=$resultado->fetch_assoc()){
        $busername=stripslashes($fila['username']);
        $bnombres=stripslashes($fila['nombres']);
        $bapellidos=stripslashes($fila['apellidos']);
        $bemail=stripslashes($fila['email']);
        $bid_usuario=stripslashes($fila['id_usuario']);
        $bfk_id_estado=stripslashes($fila['fk_id_estado']);

        if($bfk_id_estado=="1"){
            $bfk_id_estado='activo';
        }
        if($bfk_id_estado=="2"){
            $bfk_id_estado='inactivo';
        }
        echo "<tr>";
        echo "<td class='id_usu'>$bid_usuario</td>";
        echo "<td>$busername</td>";
        echo "<td>$bfk_id_estado</td>";
        echo "<td>$bnombres</td>";
        echo "<td>$bapellidos</td>";
        echo "<td>$bemail</td>";
        ?>
        <td>
            <a href="#" class="badge badge-danger delete_btn"><i class="fas fa-trash-alt"></i></a>
        </td>
        <?php
        if($bfk_id_estado=="activo"){
            echo "<td><a href='neg_cambiar_estado_usu.php?id=$bid_usuario'><i class='fas fa-check text-success'></i></a></td>";   
        }
        if($bfk_id_estado=="inactivo"){
            echo "<td><a href='neg_cambiar_estado_usu.php?id=$bid_usuario'><i class='fas fa-times-circle text-danger'></i></a></td>";   
        }
       
        echo "</tr>";
    }

    ?>
 </table>
   <!-- Modal eliminacion de categorias -->
<div class="modal fade" id="eliminar_usuario" tabindex="-1" aria-labelledby="eliminar_usuarioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="eliminar_usuarioLabel">Eliminar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form action="neg_dat_eliminar_usuarios.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="id_cod" id="cod_id">
                <h4>¿Estas Seguro de eliminar este usuario ?</h4>
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
                $('#nombre_cate').val(info.cat_descripcion);
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

    var id_usu = $(this).closest('tr').find('.id_usu').text();
    //console.log(id_cat);
    $('#cod_id').val(id_usu);
    $('#eliminar_usuario').modal('show');
});
});
</script>


</body>
</html>
