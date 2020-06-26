<?php
session_start();
require_once __DIR__.'/../modelo/ProductoModelo.php';
require_once __DIR__.'/../modelo/CategoriaModelo.php';
$abc = $_SESSION['id'];
//echo $abc;
$connect = mysqli_connect("localhost", "root", "", "bd_proyectofinal");
function llenarCategoria($connect,$a)
{
    $output= '';
    $sql = "SELECT * FROM categoria where idEmpresa = '$a';";
    $resultado = mysqli_query($connect,$sql);
    while($row = $resultado->fetch_row())
    {
        $output .= '<option value="'.$row[0].'">'.$row[1].'</option>';
        
    }
    return $output;
}
function llenarProducto($connect,$a)
{
    $output = '';
    $sql = "SELECT * from producto where idEmpresa ='$a'";
    $resultado = mysqli_query($connect,$sql);
    while($row = $resultado->fetch_row())
    {
        $output .= "<tr>\n";
        $output .= "<td>$row[0]</td>\n";
        $output .= ' <td><img src="data:image/jpeg;base64,'.base64_encode( $row[4] ).'"height="200" width="200" class="img-thumnail"/></td>';
        $output .= "<td>$row[1]</td>\n";
        $output .= "<td>$row[2]</td>\n";
        $output .= "<td>$row[3] bs</td>\n";
        $output .= "<td style='display:none;'>$row[5]</td>\n";
        $output .= "<td style='display:none;'>$row[6]</td>\n";
        $output .= "<td class=\"td-actions text-right\">\n";
        $output .= " <button type=\"submit\" onclick=\"location.href='EditarProducto.php ? pid=$row[0]&pnombre=$row[1]&pdescripcion=$row[2]&pprecio=$row[3]&pempresa=$row[5]&pcategoria=$row[6]'\" rel=\"tooltip\" title=\"Editar\" name = \"editar$row[0]\" value = \"$row[0]\" class=\"btn btn-info btn-simple btn-link\">\n";
        $output .= "<i class=\"fa fa-edit\"></i>\n";
        $output .= "</button>\n";
        $output .= "<button type=\"button\" onclick=\"location.href='../controlador/controladorBorrarProducto.php ? pid=$row[0]'\" rel=\"tooltip\" title=\"Eliminar\" name = \"eliminar$row[0]\" class=\"btn btn-danger btn-simple btn-link\">\n";
        $output .= "<i class=\"fa fa-times\"></i>\n";
        $output .= " </button>\n";
        $output .= "</td>\n";
        $output .= "</tr>\n";
    }
    return $output;
}
print "<!DOCTYPE html>\n";
print "<html lang=\"en\">\n";
print "\n";
print "<head>\n";
print "    <meta charset=\"utf-8\" />\n";
print "<script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js\"></script>";
print "    <link rel=\"apple-touch-icon\" sizes=\"76x76\" href=\"../assets/img/apple-icon.png\">\n";
print "    <link rel=\"icon\" type=\"image/png\" href=\"../assets/img/favicon.ico\">\n";
print "    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\" />\n";
print "    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>\n";
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
print "                Delivery SLC (EMPRESA)\n";
echo $_SESSION['userEmpr'];
//echo $_SESSION['id'];
print "            </a>\n";
print "        </div>\n";
print "        <ul class=\"nav\">\n";
print "            <li class=\"nav-item\">\n";
print "                <a class=\"nav-link\" href=\"categoriagestion.php\">\n";
print "                    <i class=\"nc-icon nc-chart-pie-35\"></i>\n";
print "                    <p>Gestion Categorias</p>\n";
print "                </a>\n";
print "            </li>\n";
print "            <li class=\"nav-item active\">\n";
print "                <a class=\"nav-link\" href=\"./productogestion.php\">\n";
print "                    <i class=\"nc-icon nc-chart-pie-35\"></i>\n";
print "                    <p>Gestion Productos</p>\n";
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
print "            <a class=\"navbar-brand\" href=\"productogestion.php\"> Gestion de Productos </a>\n";
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
print "                            <h4 class=\"card-title\">Lista de Productos</h4>\n";
print "                            <p class=\"card-category\">Delivery SLC</p>\n";
echo "<br><br>";
print "                            <p class=\"card-category\"><b>Buscar Productos por Categoria</p>\n";
?>
<p>
    <select name="categoria" id="categoria">
        <option value="">MOSTRAR TODO</option>
        <?php echo llenarCategoria($connect,$abc); ?>
    </select>
</p>

<?php
print "                            <button type=\"submit\" onclick=\"location.href='RegistrarProducto.php'\" class=\"btn btn-info btn-fill pull-left\">Registrar Nuevo Producto</button>\n";
print "                        </div>\n";
print "                        <div id=\"show_product\" class=\"card-body table-full-width table-responsive\">\n";

$Obj = new producto();
$auxiliar = $Obj->obtenerProductos($_SESSION['id']);
//$aux = $Obj->obtenerTodos($_SESSION['id']);

print "                            <table class=\"table table-hover table-striped\">\n";
print "                                <thead>\n";
print "                                    <th>ID</th>\n";
print "                                    <th>Logo</th>\n";
print "                                    <th>Nombre</th>\n";
print "                                    <th>Descripcion</th>\n";
print "                                    <th>Precio</th>\n";
print "                                </thead>\n";
print "                                <tbody>\n";
//while($fila = $auxiliar->fetch_row()){
//print "                                    <tr>\n";
echo llenarProducto($connect,$abc);





//print "                                         <td> $fila[0] </td>\n";
//echo '                                        <td><img src="data:image/jpeg;base64,'.base64_encode( $fila[4] ).'"height="200" width="200" class="img-thumnail"/></td>';
//print "                                        <td>$fila[1]</td>\n";
//print "                                        <td>$fila[2]</td>\n";
//print "                                        <td>$fila[3]</td>\n";
//print "                                        <td class=\"td-actions text-right\">\n";
//$_SESSION['id'] = $fila[0];
//$_SESSION['nomb'] = $fila[1];
//$_SESSION['pass'] = $fila[2];
//print "                                            <button type=\"submit\" onclick=\"location.href='EditarProducto.php ? pid=$fila[0]&pnombre=$fila[1]&pdescripcion=$fila[2]'\" rel=\"tooltip\" title=\"Editar\" name = \"editar$fila[0]\" value = \"$fila[0]\" class=\"btn btn-info btn-simple btn-link\">\n";
//print "                                                <i class=\"fa fa-edit\"></i>\n";
//print "                                            </button>\n";
//print "                                            <button type=\"button\" onclick=\"location.href='../controlador/controladorBorrarProducto.php ? pid=$fila[0]'\" rel=\"tooltip\" title=\"Eliminar\" name = \"eliminar$fila[0]\" class=\"btn btn-danger btn-simple btn-link\">\n";
//print "                                                <i class=\"fa fa-times\"></i>\n";
//print "                                            </button>\n";
//print "                                        </td>\n";
//print "                                    </tr>\n";
//print "                                    <tr>\n";
//}
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
print "                    ©\n";
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
<script>  
 $(document).ready(function(){  
      $('#categoria').change(function(){  
           var idCategoria = $(this).val();  
           $.ajax({  
                url:"load_data.php",  
                method:"POST",  
                data:{idCategoria:idCategoria},  
                success:function(data){  
                     $('#show_product').html(data);  
                }  
           });  
      });  
 });  
 </script>  
