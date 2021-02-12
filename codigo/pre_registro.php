
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
                <h1 class="h4 text-gray-900 mb-4"><b style="color: white;">REGRISTRAR</b></h1>
              </div>


   
   <div class="container" >

<!-- Outer Row -->
<div class="row justify-content-center">




  <div class="col-xl-10 col-lg-12 col-md-9">

    <div class="card o-hidden border-0 shadow-lg my-2">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-6 d-none d-lg-block" ><img src="../imagen/gatoq.jpeg" ></div><!--imagen-->
          <div class="col-lg-6" >
            <div class="p-5">
              <div class="text-center" >
                <h1 class="h4 text-dark mb-3"><b>STRONG INVENTORIES</b></h1>
            
              </div>
                <div >

                <!--inicio del formulario de reguistro-->
                    <?php
                    @$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
                    if ($error=="error")
                    {

                        echo "<p style='color:red'>La contraseña o el documentos son incorrectos</p>";
                    } 

                    @$error=$_GET["error"];// cuando se ingresan mal los datos vote un mensaje de error
                    if ($error=="ina")
                    {

                        echo "<p style='color:red'>El usuario no esta disponible</p>";
                    } 

                    ?>
                    <!--- formulario para evaluar registro-->
                    <form action="neg_dat_registrar.php" method="post" id="registro" name="registro" autocomplete="off">
       
     
                </div>
                <div class="form-group">
                  <input type="text" minlength="3" class="form-control form-control-user" id="nombres" name="nombres" required placeholder="Nombres">
                </div> 
                <div class="form-group">
                  <input type="text" minlength="3" class="form-control form-control-user" id="apellidos" name="apellidos" required placeholder="Apellidos">
                </div>
                <div class="form-group">
                  <input type="text" minlength="5" class="form-control form-control-user" id="usuario" name="usuario" required placeholder="Usuario">
                </div>
                <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="email" name="email" required placeholder="Correo Electronico">
                </div>
   
                <div class="form-group">
                  <input type="password" minlength="5" class="form-control form-control-user" id="password" name="password" required placeholder="Contrasena">
                </div>
                <div class="form-group">
                  <input type="password" minlength="3" class="form-control form-control-user" id="rpassword" name="rpassword" required placeholder="Repita Contrasena">
                </div>

                <input type="hidden" id="id_estado" name="id_estado" value="1">


                <div align="center">

                    
                    <a href="pre_login.php" class="btn btn-primary btn ">
                    <i class="icon ion-md-close mr-1 lead"></i>

                      Cancelar
                    </a>
                    <span>ó</span>
                    <button  type="submit" value="Ingresar" class="btn btn-primary btn ">
                       Registrate<i class="icon ion-md-checkmark lead"></i>
                    </button>
                
              
                </form><!--Fin del formulario de inicio de sesion-->
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