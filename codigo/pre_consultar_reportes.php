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

  <title>Reportes</title>


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
                    <h3 class="m-0 font-weight-bold" style="color: black;">Lista de reportes</h3>
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
    <table class="table table-responsive-xl table-bordered  table-ligth table-hover " >

                  
<thead style="background-color: black;" class="text-light" >

    <tr align="center" >
        <th colspan="2">Id reporte</th>
        <th>Codigo Producto</th>
        <th>Nombre Producto</th>
        <th>Cantidad Reportada</th>
        <th>Observaciones</th>
        <th>Fecha de Creaci&oacute;n</th>
        <th>Usuario</th>
        <th>Estado</th>
    </tr>
</thead>
    <?php
    include("conexion.php");
    $consulta="SELECT * FROM ingresos_det a INNER JOIN estados b ON a.fk_id_estado=b.id_estado";
    if(!$resultado=$db->query($consulta)){
    die('hay un error con la consulta o los datos no existen vuelve a comprobar !!![' . $db->error . ']');
    }
    while($fila=$resultado->fetch_assoc()){
        $bid_ing_det=stripslashes($fila['id_ing_det']);
        $bfk_id_producto=stripslashes($fila['fk_id_producto']);
        $bnombre_producto=stripslashes($fila['nombre_producto']);
        $bcantidad=stripslashes($fila['cantidad']);
        $bobservaciones=stripslashes($fila['observacion']);
        $bfecha_creacion=stripslashes($fila['fecha_creacion']);
        $busuario_creacion=stripslashes($fila['usuario_creacion']);
        $bfk_id_estado=stripslashes($fila['fk_id_estado']);
        $bnombre_estado=stripslashes($fila['nombre_estado']);

        echo "<tbody align='center'>";
        echo "<tr>";
        echo "<td>#</td>";
        echo "<td class='id_prov'>$bid_ing_det</td>";
        echo "<td>$bfk_id_producto</td>";
        echo "<td>$bnombre_producto</td>";
        echo "<td>$bcantidad</td>";
        echo "<td>$bobservaciones</td>";
        echo "<td>$bfecha_creacion</td>";
        echo "<td>$busuario_creacion</td>";
        echo "<td>$bnombre_estado</td>";     
        echo "</tr>"; 
        echo "</tbody>";
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
        url: "det_prov_ajax.php",
        data: {actt:action,prov:proveedor},
        async:true,
        success: function (response) {
            if(response !='error'){
                $('#editar_prov').modal('show');
                var info = JSON.parse(response);
                $('#cod_proveedor').val(info.id_proveedor);
                $('.proveedor').val(info.id_proveedor);
                $('#nombre_prov').val(info.nombre_prov);
                $('#direccion_prov').val(info.direccion);
                $('#telefono_prov').val(info.telefono);
                $('#email_prov').val(info.email_prov);              

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
                $('#nombre_det').val(info.nombre_prov);
                $('#direccion_det').val(info.direccion);
                $('#telefono_det').val(info.telefono);
                $('#fecha_cre_det').val(info.fecha_creacion);
                $('#fecha_mod_det').val(info.fecha_modificacion);
                $('#usuario_cre_det').val(info.usuario_creacion);
                $('#usuario_mod_det').val(info.usuario_modificacion);
                $('#email_det').val(info.email_prov);               

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