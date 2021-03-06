<?php
session_start();
require_once __DIR__.'/../modelo/MotoqueroModelo.php';
//require_once("ConectarDB.php");
?>
 <!DOCTYPE html>

 <html lang="en">

 <head>
     <meta charset="utf-8" />
    <script src="http://maps.google.com/maps/api/js?libraries=places&region=uk&language=en&sensor=true"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
     <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
     <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
     <title>DELIVERY SLC</title>
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
                         echo "\n";
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
                     <li class="nav-item active">
                         <a class="nav-link" href="./motoquerogestion.php">
                             <i class="nc-icon nc-circle-09"></i>
                             <p>Gestion Motoqueros</p>
                         </a>
                     </li>
                     <li>
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
                     <a class="navbar-brand" href="motoquerogestion.php"> Gestion de Motoquero </a>
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
                                    <h4 class="card-title">Registrar Nuevo Motoquero</h4>
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

                                    <form name="myForm" action="RegistrarMotoquero.php" method="POST" enctype="multipart/form-data">
                                        <?php
                                        $Obj = new motoquero();
                                        $aux = $Obj->ultimoCodigo();
                                        $fila = $aux->fetch_row();
                                        $siguiente = $fila[0] + 1;
                                        ?>
                                     
                                       <div class="row">
                                            <div class="col-md-1 pr-1">
                                                <div class="form-group">
                                                    <label>ID</label>
                                                    <input type="text" class="form-control" readonly="readonly" placeholder="#" value="<?php echo $siguiente; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>NOMBRE*</label>
                                                    <input type="text" name ="txtNombre"class="form-control" placeholder="NOMBRE" required>
                                                </div>
                                            </div>
                                            <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">CONTRASENA*</label>
                                                    <input type="password" name="txtClave" class="form-control" placeholder="CONTRASENA" required>
                                                </div>
                                            </div>
                                             <div class="col-md-4 pl-1">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">CONFIRMAR CONTRASENA*</label>
                                                    <input type="password" name ="txtClave2" class="form-control" placeholder="CONFIRMAR CONTRASENA" required>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Segunda Fila -->

                                      
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>CORREO*</label>
                                                    <input type="email" name="txtCorreo" class="form-control" placeholder="CORREO" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>TELEFONO*</label>
                                                    <input type="text" name ="txtTelefono"class="form-control" placeholder="TELEFONO" required>
                                                </div>
                                            </div>   
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>USUARIO*</label>
                                                    <input type="text" name ="txtUsuario"class="form-control" placeholder="USUARIO" required>
                                                </div>
                                            </div>                                         
                                        

                                        <!-- Tercera Fila -->

                                        
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Carnet de Identidad*</label>
                                                    <input type="text" name="txtCI" class="form-control" placeholder="CARNET DE IDENTIDAD" required>
                                                </div>
                                            </div>
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Placa*</label>
                                                    <input type="text" name ="txtPlaca"class="form-control" placeholder="PLACA" required>
                                                </div>
                                            </div> 
                                            <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>Estado*</label>
                                                   <select id="estado" name="estado">
                                                  <option value="ACTIVO"selected>ACTIVO</option>
                                                  <option value="INACTIVO">INACTIVO</option>                                               
                                                </select>
                                                </div>
                                            </div>                                          
                                       

                                        <input type="submit" name ="btnAdicionar" id="btnAdicionar" class="btn btn-info btn-fill pull-right" value="Registrar Nuevo Motoquero" onclick="return verificar();">
                                         <!--<div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>-->


                                          <div class="col-md-3 px-1">
                                                <div class="form-group">
                                                    <label>FOTO DE PERFIL*</label><br>
                                                     <input type="file" id="image" name="image">
                                       <!--NO USAR<input type="submit" name="insert" id="insert" value="Insert" /> -->
                                                </div>
                                            </div>

                                    </form>

                                    <?php
                                    if(isset($_POST['btnAdicionar']))
                                        {
                                            require_once __DIR__.'/../modelo/MotoqueroModelo.php';
                                            $Obj = new motoquero();
                                      $connect = mysqli_connect("localhost", "root", "", "bd_proyectofinal"); 
                                      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                                            $Obj->setNombre($_POST['txtNombre']);
                                            $Obj->setCorreo($_POST['txtCorreo']);
                                            $Obj->setTelefono($_POST['txtTelefono']);
                                            $Obj->setCI($_POST['txtCI']);
                                            $Obj->setPlaca($_POST['txtPlaca']);
                                            $Obj->setEstado($_POST['estado']);
                                            $Obj->setContrasena($_POST['txtClave']);
                                            $Obj->setUsuario($_POST['txtUsuario']);
                                    
                                    $a = $Obj->getNombre();
                                    $b = $Obj->getCorreo();
                                    $c = $Obj->getTelefono();
                                    $d = $Obj->getCI();
                                    $e = $Obj->getPlaca();
                                    $f = $Obj->getEstado();
                                    $g = $Obj->getContrasena();
                                    $h = $Obj->getUsuario();

                                    $query = "INSERT INTO motoquero(nombre, correo, contrasena, CI, placa, estado, imagen, telefono, usuario) VALUES('$a','$b','$g','$d','$e','$f','$file','$c','$h');";  
         if(mysqli_query($connect, $query))  
      {  
           echo '<script>alert("SE ADICIONO EXITOSAMENTE")</script>'; 
                                    mysqli_close($connect);
      }     
                                   /* echo "<script>alert('SE ADICIONO EXITOSAMENTE');</script>";
                                            $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
                                            $Obj->setImagen($file);
                                            $Obj->setNombre($_POST['txtNombre']);
                                            $Obj->setCorreo($_POST['txtCorreo']);
                                            $Obj->setTelefono($_POST['txtTelefono']);
                                            $Obj->setLongitud($_POST['latitud']);
                                            $Obj->setLatitud($_POST['longitud']);
                                            $Obj->setContrasena($_POST['txtClave']);
                                            $Obj->adicionarEmpresa();
                                            */

                                            echo " <script>window.location = '/proyectoFinal/vista/motoquerogestion.php';</script>";
                                    }
                                    ?>
                                    <script>

                                        $(document).ready(function () {
                                            $('#btnAdicionar').click(function () {
                                                var image_name = $('#image').val();
                                                if (image_name == '') {
                                                    alert("Selecciona Imagen Porfavor");
                                                    return false;
                                                } else {
                                                    var extension = $('#image').val().split('.').pop().toLowerCase();
                                                    if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1)
                                                    {
                                                        alert('Imagen Invalida');
                                                        $('#image').val('');
                                                        return false;
                                                    }
                                                }
                                            });
                                        });

                                    </script>
                              
                                
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
             </div>
            <!--GOOGLE MAPS-->



               <script>
function initMap() {
      var geocoder = new google.maps.Geocoder();
  var lat = -17.749,
      lng = -63.176,
      latlng = new google.maps.LatLng(lat, lng),
      image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
  var mapOptions = {
      center: new google.maps.LatLng(lat, lng),
      zoom: 13,
      mapTypeId: google.maps.MapTypeId.ROADMAP,
      panControl: true,
      panControlOptions: {
          position: google.maps.ControlPosition.TOP_RIGHT
      },
      zoomControl: true,
      zoomControlOptions: {
          style: google.maps.ZoomControlStyle.LARGE,
          position: google.maps.ControlPosition.TOP_left
      }
  },
      map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions),

      marker = new google.maps.Marker({
          position: latlng,
          map: map,
          icon: image,
          draggable: true,
      });

   var input = document.getElementById('searchTextField');
    var infowindow = new google.maps.InfoWindow();

        google.maps.event.addListener(marker, 'dragend', function () {
            var lat = marker.getPosition().lat();
            var lng = marker.getPosition().lng();

document.getElementById('MapLat').value = lat;
document.getElementById('MapLon').value = lng;

   });
        }

    </script>

               <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCirmC7s8JbiGHJCCC_nYFp30xg2Ozzy1I&callback=initMap">
    </script>













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
