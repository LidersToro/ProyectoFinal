<?php
session_start();
require_once __DIR__.'/../modelo/AdminModelo.php';
$userid = $_GET['pid'];
$usu = $_GET['pusuario'];
?>
 <!DOCTYPE html>

 <html lang="en">

 <head>
     <meta charset="utf-8" />
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
     <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
     <!--     Fonts and icons     -->
     <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
     <!-- CSS Files -->
     <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
     <link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />
     <!-- CSS Just for demo purpose, don't include it in your project -->
     <link href="../assets/css/demo.css" rel="stylesheet" />
 </head>

 <body>
     <div class="wrapper">
         <div class="sidebar" data-image="../assets/img/sidebar-5.jpg">

             <div class="sidebar-wrapper">
                 <div class="logo">
                     <a href="#pablo" class="simple-text">
                         Delivery SLC (ADMIN)
                         <?php

                         echo $_SESSION['user'];
                         ?>
                     </a>
                 </div>
                 <ul class="nav">
                     <li>
                         <a class="nav-link" href="empresagestion.php">
                             <i class="nc-icon nc-chart-pie-35"></i>
                             <p>Gestion de Empresas</p>
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="./motoquerogestion.php">
                             <i class="nc-icon nc-circle-09"></i>
                             <p>Gestion Motoqueros</p>
                         </a>
                     </li>
                    <li class="nav-item active">
                         <a class="nav-link" href="./useradmin.php">
                             <i class="nc-icon nc-circle-09"></i>
                             <p>Gestion de Admin</p>
                         </a>
                     </li>
                     <!--<li class="nav-item active active-pro">
                         <a class="nav-link active" href="upgrade.html">
                             <i class="nc-icon nc-alien-33"></i>
                             <p>Upgrade to PRO</p>
                         </a>
                     </li>-->
                 </ul>
             </div>
         </div>
         <div class="main-panel">
             <!-- Navbar -->
             <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                 <div class="container-fluid">
                     <a class="navbar-brand" href="#pablo"> Gestion de Admin </a>
                     <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                         <span class="navbar-toggler-bar burger-lines"></span>
                     </button>
                     <div class="collapse navbar-collapse justify-content-end" id="navigation">
                         <ul class="nav navbar-nav mr-auto">
                             <li class="nav-item">
                                 <a href="#" class="nav-link" data-toggle="dropdown">
                                     <span class="d-lg-none">Tablero</span>
                                 </a>
                             </li>
                         </ul>
                         <ul class="navbar-nav ml-auto">
                             <li class="nav-item">
                                 <a class="nav-link" href="#pablo">
                                     <span class="no-icon">Perfil</span>
                                 </a>
                             </li>

                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="login.html">
                                     <span class="no-icon">Cerrar Sesi&oacute;n</span>
                                 </a>
                             </li>
                         </ul>
                     </div>
                 </div>
             </nav>
             <!-- End Navbar -->
             <div class="content">
                 <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Modificar Admin</h4>
                                </div>
                                <div class="card-body">
 <script>
    function verificar()
    {

        if (myForm.txtClave.value != myForm.txtClave2.value)
        {
            alert("No Coinciden las contrasenas!");
            return false;
        }
        return true;
    }
</script>
                                    <form name="myForm" action="EditarAdmin.php" method="POST">
                                        <?php
                                        $Obj = new admin();
                                        $aux = $Obj->ultimoCodigo();
                                        $fila = $aux->fetch_row();
                                        $siguiente = $fila[0] + 1;
                                        ?>
                                        <div class="row">
                                            <div class="col-md-1 pr-1">
                                                <div class="form-group">
                                                    <label>ID</label>
                                                    <input type="text" name="txtId" class="form-control" readonly="readonly" placeholder="#" value="<?php echo $userid; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>USUARIO</label>
                                                    <input type="text" name="txtU" class="form-control" readonly="readonly" placeholder="USUARIO" value="<?php echo $usu; ?>" />
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">CONTRASENA</label>
                                                    <input type="password" name="txtClave" class="form-control" placeholder="CONTRASENA" required>
                                                </div>
                                            </div>
                                             <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">CONFIRMAR CONTRASENA</label>
                                                    <input type="password" name ="txtClave2" class="form-control" placeholder="CONFIRMAR CONTRASENA" required>
                                                </div>
                                            </div>

                                        </div>
                                        <input type="submit" name ="btnModificar" class="btn btn-info btn-fill pull-right" value="Modificar Admin" onclick="return verificar();">
                                        <div class="clearfix"></div>
                                    </form>
                                    <?php
                                    if(isset($_POST['btnModificar']))
                                        {
                                            require_once __DIR__.'/../modelo/AdminModelo.php';
                                            $Obj = new admin();
                                            echo "<script>alert('SE MODIFICO EXITOSAMENTE');</script>";
                                            $Obj->modificarUsuario($_POST['txtClave'],$_POST['txtU']);
                                            echo " <script>window.location = '/proyectofinal/vista/useradmin.php';</script>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
             <footer class="footer">
                 <div class="container-fluid">
                     <nav>
                         <p class="copyright text-center">
                             �
                             <script>
                                 document.write(new Date().getFullYear())
                             </script>
                             <a href="dashboard.html">Landing Web</a>, la mejor empresa de desarrollo web.
                         </p>
                     </nav>
                 </div>
             </footer>
         </div>
     </div>
  <!--   -->
     <!-- <div class="fixed-plugin">
     <div class="dropdown show-dropdown">
         <a href="#" data-toggle="dropdown">
             <i class="fa fa-cog fa-2x"> </i>
         </a>

         <ul class="dropdown-menu">
             <li class="header-title"> Sidebar Style</li>
             <li class="adjustments-line">
                 <a href="javascript:void(0)" class="switch-trigger">
                     <p>Background Image</p>
                     <label class="switch">
                         <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                     </label>
                     <div class="clearfix"></div>
                 </a>
             </li>
             <li class="adjustments-line">
                 <a href="javascript:void(0)" class="switch-trigger background-color">
                     <p>Filters</p>
                     <div class="pull-right">
                         <span class="badge filter badge-black" data-color="black"></span>
                         <span class="badge filter badge-azure" data-color="azure"></span>
                         <span class="badge filter badge-green" data-color="green"></span>
                         <span class="badge filter badge-orange" data-color="orange"></span>
                         <span class="badge filter badge-red" data-color="red"></span>
                         <span class="badge filter badge-purple active" data-color="purple"></span>
                     </div>
                     <div class="clearfix"></div>
                 </a>
             </li>
             <li class="header-title">Sidebar Images</li>

             <li class="active">
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="../assets/img/sidebar-1.jpg" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="../assets/img/sidebar-3.jpg" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="..//assets/img/sidebar-4.jpg" alt="" />
                 </a>
             </li>
             <li>
                 <a class="img-holder switch-trigger" href="javascript:void(0)">
                     <img src="../assets/img/sidebar-5.jpg" alt="" />
                 </a>
             </li>

             <li class="button-container">
                 <div class="">
                     <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                 </div>
             </li>

             <li class="header-title pro-title text-center">Want more components?</li>

             <li class="button-container">
                 <div class="">
                     <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                 </div>
             </li>

             <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

             <li class="button-container">
                 <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> � 256</button>
                 <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> � 426</button>
             </li>
         </ul>
     </div>
 </div>
  -->
 </body>
 <!--   Core JS Files   -->
 <script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
 <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
 <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
 <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
 <script src="../assets/js/plugins/bootstrap-switch.js"></script>
 <!--  Google Maps Plugin    -->
 <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
 <!--  Chartist Plugin  -->
 <script src="../assets/js/plugins/chartist.min.js"></script>
 <!--  Notifications Plugin    -->
 <script src="../assets/js/plugins/bootstrap-notify.js"></script>
 <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
 <script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
 <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
 <script src="../assets/js/demo.js"></script>
 <</html>
