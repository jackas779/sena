
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
      <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/default.css" />
    <link rel="stylesheet" type="text/css" href="../css/component.css" />
    <script src="../js/modernizr.custom.js"></script>
    <link rel="stylesheet" href="styles.css">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Ovo&display=swap" rel="stylesheet">
</head>
<body style="background: linear-gradient(to bottom, #0A9AE8 , black );">

<br>
   
            <div class="text-center" >
                <h1 class="h4 text-gray-900 mb-4"><b style="color: white;">INICIAR SESION</b></h1>
              </div>


   
   <div class="container" >

<!-- Outer Row -->
<div class="row justify-content-center">




  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-2">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block" ><img src="../imagen/gatologin.jpeg"></div><!--imagen-->
          <div class="col-lg-6" >
            <div class="p-5">
              <div class="text-center" >
                <h1 class="h4 text-gray-900 mb-4"><b>STRONG INVENTORIES</b></h1>
              </div>
                <div >

                <!--inicio del formulario de reguistro-->
                    <?php
                    @$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
                    if ($error=="error")
                    {

                        echo "<p style='color:red'>La contraseña o el usuarios son incorrectos</p>";
                    } 

                    @$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
                    if ($error=="ina")
                    {

                        echo "<p style='color:red'>El usuario no esta disponible</p>";
                    } 

                    ?>
               <form action="neg_login.php" method="post" id="login" name="login" autocomplete="off">
                    <!--- formulario para evaluar sesion-->
            
                </div>
                <div class="form-group">
                  <input type="text" name="usuario" class="form-control form-control-user" id="usuario" required placeholder="Usuario">
                </div> 
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-user" id="password" required placeholder="Contrasena">
                </div>
                
                <button class="btn btn-primary btn-user btn-block" value="Ingresar">
                   Iniciar Sesion
                </button>
                </form><!--Fin del formulario de inicio de sesion-->
                <hr>
               
                <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.html" style="color: #0A9AE8;">¿Olvido su contraseña?</a>
              </div>
              <div class="text-center">
                <a  href="pre_registro.php" class="small" style="color: #0A9AE8;" >Crear Cuenta</a>
                <hr>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

</div>

</div>


  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script> 



</body>
</html>