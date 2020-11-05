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

  <title>Usuarios</title>


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
                    <h3 class="m-0 font-weight-bold" style="color: black;">Usuarios disponibles</h3>
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
        <td>Id Usuario</td>
        <td>Nombre de Usuario</td>
        <td>Estado</td>
        <td>Nombres</td>
        <td>Apellidos</td>
        <td>Correo electronico</td>
        <td colspan="3">Acciones</td>
    </tr>
</thead>
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
        echo "<tbody align='center'>";
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
        echo "</tbody>";
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

//modal actualizar usuarios
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
//modal confirmacion eliminar  usuarios
$('.delete_btn').click(function (e) { 
    e.preventDefault();

    var id_usu = $(this).closest('tr').find('.id_usu').text();
    //console.log(id_cat);
    $('#cod_id').val(id_usu);
    $('#eliminar_usuario').modal('show');
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