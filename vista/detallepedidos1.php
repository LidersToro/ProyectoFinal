<?php
session_start();
require_once __DIR__.'/../modelo/OrdenProductoModelo.php';
require_once __DIR__.'/../modelo/OrdenModelo.php';
require_once __DIR__.'/../modelo/EmpresaModelo.php';
require_once __DIR__.'/../modelo/ClienteModelo.php';
$id = $_GET['pid'];
$_SESSION['id']=$id;
$emp = $_GET['pempresa'];
$cli = $_GET['pcliente'];
$ObjDetalle = new ordenproducto();
$a = $ObjDetalle->obtenerDetalle($id);
//$detalle = $a->fetch_row();


$Obj = new empresa();
$aux = $Obj->obtenerDireccion($emp);
$valor=$aux->fetch_row();
$lat = floatval($valor[0]);
$lon = floatval($valor[1]);
$_SESSION['lat'] = $lat;
$_SESSION['lon'] = $lon;


$ObjCli = new cliente();
$aux1 = $ObjCli->obtenerDireccion($cli);
$valor1=$aux1->fetch_row();
$latCli = floatval($valor1[0]);
$lonCli = floatval($valor1[1]);
$_SESSION['latCli'] = $latCli;
$_SESSION['lonCli'] = $lonCli;

//echo $_SESSION['idMot'];
print "<!DOCTYPE html>\n";
print "<html lang=\"en\">\n";
print "\n";
print "<head>\n";
print "    <meta charset=\"utf-8\" />\n";
print "    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"../assets/img/apple-icon.png\">\n";
print "    <link rel=\"icon\" type=\"image/png\" href=\"../assets/img/favicon.ico\">\n";
print "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />\n";
print "    <title>DELIVERY SLC</title>\n";
print "    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />\n";
print "    <!--     Fonts and icons     -->\n";
print "    <link href=\"https://fonts.googleapis.com/css?family=Montserrat:400,700,200\" rel=\"stylesheet\" />\n";
print "    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css\" />\n";
print "    <!-- CSS Files -->\n";
print "    <link href=\"../assets/css/bootstrap.min.css\" rel=\"stylesheet\" />\n";
print "    <link href=\"../assets/css/light-bootstrap-dashboard.css?v=2.0.0 \" rel=\"stylesheet\" />\n";
print "    <!-- CSS Just for demo purpose, don't include it in your project -->\n";
print "    <link href=\"../assets/css/demo.css\" rel=\"stylesheet\" />\n";
print "</head>\n";
print "\n";
print "<body>\n";
print "    <div class=\"wrapper\">\n";
print "        <div class=\"sidebar\" data-image=\"../assets/img/sidebar-5.jpg\">\n";
print "            <!--\n";
print "        Tip 1: You can change the color of the sidebar using: data-color=\"purple | blue | green | orange | red\"\n";
print "\n";
print "        Tip 2: you can also add an image using data-image tag\n";
print "    -->\n";
print "    <div class=\"sidebar-wrapper\">\n";
print "        <div class=\"logo\">\n";
print "            <a href=\"#pablo\" class=\"simple-text\">\n";
print "                Delivery SLC (MOTOQUERO)\n";
echo $_SESSION['userMot'];
//echo $_SESSION['id'];
print "            </a>\n";
print "        </div>\n";
print "        <ul class=\"nav\">\n";
print "            <li class=\"nav-item\">\n";
print "                <a class=\"nav-link\" href=\"pedidogestion.php\">\n";
print "                    <i class=\"nc-icon nc-chart-pie-35\"></i>\n";
print "                    <p>PEDIDOS DISPONIBLES</p>\n";
print "                </a>\n";
print "            </li>\n";
print "            <li class=\"nav-item active\">\n";
print "                <a class=\"nav-link\" href=\"./motoqueropedidos.php\">\n";
print "                    <i class=\"nc-icon nc-chart-pie-35\"></i>\n";
print "                    <p>MIS PEDIDOS</p>\n";
print "                </a>\n";
print "            </li>\n";
//print "            <li class=\"nav-item\">\n";
//print "                <a class=\"nav-link\" href=\"./useradmin.php\">\n";
//print "                    <i class=\"nc-icon nc-circle-09\"></i>\n";
//print "                    <p>Gestion de Admin</p>\n";
//print "                </a>\n";
//print "            </li>\n";
//print "            <li>\n";
//print "                <a class=\"nav-link\" href=\"./reporteempresa.php\">\n";
//print "                    <i class=\"nc-icon nc-pin-3\"></i>\n";
//print "                    <p>Pedidos</p>\n";
//print "                </a>\n";
//print "            </li>\n";
//print "            <li class=\"nav-item active active-pro\">\n";
//print "                <a class=\"nav-link active\" href=\"upgrade.html\">\n";
//print "                    <i class=\"nc-icon nc-alien-33\"></i>\n";
//print "                    <p>Upgrade to PRO</p>\n";
//print "                </a>\n";
//print "            </li>\n";
print "        </ul>\n";
print "    </div>\n";
print "</div>\n";
print "<div class=\"main-panel\">\n";
print "    <!-- Navbar -->\n";
print "    <nav class=\"navbar navbar-expand-lg \" color-on-scroll=\"500\">\n";
print "        <div class=\"container-fluid\">\n";
print "            <a class=\"navbar-brand\" href=\"categoriagestion.php\"> Lista de Pedidos </a>\n";
print "            <button href=\"\" class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" aria-controls=\"navigation-index\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">\n";
print "                <span class=\"navbar-toggler-bar burger-lines\"></span>\n";
print "                <span class=\"navbar-toggler-bar burger-lines\"></span>\n";
print "                <span class=\"navbar-toggler-bar burger-lines\"></span>\n";
print "            </button>\n";
print "            <div class=\"collapse navbar-collapse justify-content-end\" id=\"navigation\">\n";
print "                <ul class=\"nav navbar-nav mr-auto\">\n";
print "                    <li class=\"nav-item\">\n";
print "                        <a href=\"#\" class=\"nav-link\" data-toggle=\"dropdown\">\n";
print "                            <span class=\"d-lg-none\">Gestion de Usuarios</span>\n";
print "                        </a>\n";
print "                    </li>\n";
print "                </ul>\n";
print "                <ul class=\"navbar-nav ml-auto\">\n";
print "                    <li class=\"nav-item\">\n";
print "                        <a class=\"nav-link\" href=\"#pablo\">\n";
print "                            <span class=\"no-icon\">Perfil</span>\n";
print "                        </a>\n";
print "                    </li>\n";
print "                   \n";
print "                    </li>\n";
print "                    <li class=\"nav-item\">\n";
print "                        <a class=\"nav-link\" href=\"login.html\">\n";
print "                            <span class=\"no-icon\">Cerrar Sesion</span>\n";
print "                        </a>\n";
print "                    </li>\n";
print "                </ul>\n";
print "            </div>\n";
print "        </div>\n";
print "    </nav>\n";
print "    <!-- End Navbar -->\n";
print "    <div class=\"content\">\n";
print "        <div class=\"container-fluid\">\n";
print "            <div class=\"row\">\n";
print "                <div class=\"col-md-12\">\n";
print "                    <div class=\"card strpied-tabled-with-hover\">\n";
print "                        <div class=\"card-header \">\n";
print "                            <h4 class=\"card-title\">Lista de Pedidos</h4>\n";
print "                            <p class=\"card-category\">Delivery SLC</p>\n";
print "                            <button type=\"submit\" onclick=\"location.href='/../proyectoFinal/controlador/detallepedidocontrolador1.php'\" class=\"btn btn-info btn-fill pull-left\">Finalizar Pedido</button>\n";
print "<br>";
print "<br>";
print "<br>";
print "                            <button type=\"submit\" onclick=\"location.href='/../proyectoFinal/controlador/controladorgooglemaps.php'\" class=\"btn btn-info btn-fill pull-left\">Ver Trayectoria</button>\n";
print "                        </div>\n";
print "                        <div class=\"card-body table-full-width table-responsive\">\n";

//$Obj = new orden();
//$ObjEmp = new Empresa();
//$estado = 'recibido';
//$estado1 = 'finalizado';
//$aux = $Obj->obtenerTodos($estado,$estado1);
//$aux1 = $Obj->ultimoCodigo();
?>
<div id="map_canvas" style="height: 500px;width: 1550px;margin: 0.6em;"></div>

    <script>
function initMap() {
      var geocoder = new google.maps.Geocoder();
  var lat = -17.749,
      lng = -63.176,
      latlng = new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lon;?>),
      latlng1 = new google.maps.LatLng(<?php echo $latCli;?>,<?php echo $lonCli;?>),
      image = 'http://www.google.com/intl/en_us/mapfiles/ms/micons/blue-dot.png';
  var mapOptions = {
      center: new google.maps.LatLng(<?php echo $lat;?>,<?php echo $lon;?>),
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
          title: "Empresa",
          draggable: false,
      });
          marker = new google.maps.Marker({
          position: latlng1,
          map: map,
              icon: image,
          title: "Cliente",
          draggable: false,
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


<?php
print "                            <table class=\"table table-hover table-striped\">\n";
print "                                <thead>\n";
print "                                    <th>Nombre</th>\n";
print "                                    <th>Cantidad</th>\n";
print "                                    <th>Precio</th>\n";
//print "                                    <th>Empresa</th>\n";
//print "                                    <th>IDEMPRESA</th>\n";
print "                                </thead>\n";
print "                                <tbody>\n";
while($detalle = $a->fetch_row()){

print "                                    <tr>\n";
print "                                         <td> $detalle[0] </td>\n";
print "                                         <td> $detalle[2]  </td>\n";
print "                                        <td><b>$detalle[1] bs</b></td>\n";
//print "                                        <td style='display:none;'>$fila[3]</td>\n";
//$auxEmp = $ObjEmp->obtenerNombre($fila[4]);
//$filaEmp = $auxEmp->fetch_row();
//print "                                         <td> $id </td>\n";
//print "                                        <td style='display:none;'>$fila[5]</td>\n";
//echo $fila[4];
//print "                                        <td>$fila[4]</td>\n";
//print "                                        <td class=\"td-actions text-right\">\n";
//$_SESSION['id'] = $fila[0];
//$_SESSION['nomb'] = $fila[1];
//$_SESSION['pass'] = $fila[2];
//print "                                            <button type=\"submit\" onclick=\"location.href='detallepedidos.php ? pid=$fila[0]&pnombre=$fila[1]&pdescripcion=$fila[2]'\" rel=\"tooltip\" title=\"Editar\" name = \"editar$fila[0]\" value = \"$fila[0]\" class=\"btn btn-info btn-simple btn-link\">\n";
//print "                                                <i class=\"fa fa-edit\">Ver Detalles</i>\n";
//print "                                            </button>\n";
//print "                                            <button type=\"button\" onclick=\"location.href='../controlador/controladorBorrarCategoria.php ? pid=$fila[0]'\" rel=\"tooltip\" title=\"Eliminar\" name = \"eliminar$fila[0]\" class=\"btn btn-danger btn-simple btn-link\">\n";
//print "                                                <i class=\"fa fa-times\"></i>\n";
//print "                                            </button>\n";
print "                                        </td>\n";
print "                                    </tr>\n";
print "                                    <tr>\n";
}
/*for ($i = 0; $i <= $aux1; $i++)
{
if(isset($_POST['editar'.$i]))
{
    $Obj = new admin();
    $var = $Obj->buscarCuenta($_POST['editar'.$i]);
    $ej = $var->fetch_row();
    $_SESSION['id'] = $ej[0];
    $_SESSION['nomb'] = $ej[1];
}
}*/
/*for ($i = 1; $i <= $aux1; $i++)
  {
    if ($_POST['editar'.$i])
    {
    $Obj = new admin();
    $var = $Obj->buscarCuenta($_POST['editar'.$fila[0]);
    $ej = $var->fetch_row();
    $_SESSION['id'] = $ej[0];
    $_SESSION['nomb'] = $ej[1];
    }
  }*/
print "                                </tbody>\n";
print "                            </table>\n";
print "                        </div>\n";
print "                    </div>\n";
print "                </div>\n";
print "            </div>\n";
print "        </div>\n";
print "    </div>\n";
print "    <footer class=\"footer\">\n";
print "        <div class=\"container-fluid\">\n";
print "            <nav>\n";
print "                <p class=\"copyright text-center\">\n";
print "                    �\n";
print "                    <script>\n";
print "                        document.write(new Date().getFullYear())\n";
print "                    </script>\n";
print "                    <a href=\"dashboard.html\">Landing Web</a>, la mejor empresa de desarrollo web.\n";
print "                </p>\n";
print "            </nav>\n";
print "        </div>\n";
print "    </footer>\n";
print "        </div>\n";
print "    </div>";
print "    </html>";
?>
