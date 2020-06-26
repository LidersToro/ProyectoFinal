<?php
session_start();


  

/*print_r($_SESSION['carrito']);
$dim = count($_SESSION['carrito']);
for($i=0;$i<$dim;$i++){
      echo "Producto Id ".$_SESSION['carrito'][$i]['id'];
      echo "Cantidad del Producto ".$_SESSION['carrito'][$i]['cantidad'];
}*/
                   

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delivery SLC</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <script>
        function verificar() {
               <?php   

                 if(!$_SESSION['user'])
                    {
                    echo"alert(\"Inicie Sesión como cliente primero!\");";
                    echo "return false;";
                    }else{  
                    echo"alert(\"Alerta Usted procedio a una compra!\");";
                    echo "return true;";
                    }
                    
                  ?>
        }
    </script>

    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>


    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> deliveryslc@gmial.com</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__social">
                            <div class="header__top__right__auth">
                                <a href="./../../../proyectoFinal/vista/login.html"><i class="fa fa-user"></i>
                                <?php if ($_SESSION['user'] != "")
                                { echo $_SESSION['user'];
                                }else{
                                    echo "Login";                    
								}
                                ?></a>
                            </div>
                            </div>
                            <div class="header__top__right__auth">
                                <?php if ($_SESSION['user'] == "")
                                {
                                
                                
                                }else{
                                echo '<a href="./../../controlador/controladorsalirsesion.php"></i>Cerrar Sesión</a>';               
								}
                                ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Carrito de compra</h2>
                        <div class="breadcrumb__option">
                            
                            <span>Carrito de Compra</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Productos</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <form action="./../../controlador/actualizarcarrito.php" method="post">
                            <?php
                           $idfin=0;
                           $m = 0;
                            if(empty(!$_SESSION['carrito'] ))
                            {
                             $total = 0;
                             
                            $dim = count($_SESSION['carrito']);
                                         if($dim>=0)
	 	                                 {
                                                       
                                                        for($k=0;$k<$dim;$k++)
			                                            {
                                                           require_once __DIR__.'/../../modelo/ProductoModelo.php';
                                                           $id = $_SESSION['carrito'][$k]['id'];
                                                           $cantidad = $_SESSION['carrito'][$k]['cantidad'];
                                                           $Obj = new producto();
                                                           $aux = $Obj->obtenerTodosidproduc($id);
                                                           $fila= $aux->fetch_row();
                                                           $nombre=$fila[1];
                                                           $precio=$fila[3];
                                                           $imagen=base64_encode( $fila[4] );
                                                           $subtotal=$precio*$cantidad;


                        echo "                                    <td class=\"shoping__cart__item\">\n";
                        echo '                                        <img src="data:image/jpeg;base64,'.$imagen.'"height="100" width="120" class="img-thumnail"/>';
                        echo "                                        <h5>".$nombre."</h5>\n";
                        echo "                                    </td>\n";
                        echo "                                    <td class=\"shoping__cart__price\">\n";
                                                                echo $precio." Bs";
                        echo "                                    </td>\n";
                        echo "                                    <td class=\"shoping__cart__quantity\">\n";
                        echo "                                        <div class=\"quantity\">\n";
                        echo "                                            <div class=\"pro-qty\">\n";
                        echo "                                                <input name=\"cantidad$m\"type=\"text\" value=\"$cantidad\">\n";
                        echo "                                            </div>\n";
                        echo "                                        </div>\n";
                        echo "                                    </td>\n";
                        echo "                                    <td class=\"shoping__cart__total\">\n";
                        echo "                                        $subtotal Bs\n";
                        echo "                                    </td>\n";
                        echo "                                </tr>";
                                                              $total = $total + $subtotal;
                                                              $idfin=$id;
                                                              $m++;
                                                            }
                                                            
                                                            
                                          }
                                 
                             }else { 
                             
echo "                                 <td><h3>\n";
echo "                                    No tiene nada en el carrito....\n";
echo "                                 </td></h3>\n";
echo "                                 </tr>";
                             
                                 
                                
                                 } ?>
                                 

                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                    <?php
                        echo"<a href=\"./company-grid.php? pid=".$_SESSION['empresa']."\" class=\"primary-btn cart-btn\">Continuar Comprando</a>";
                        echo"<a href=\"./../../controlador/controladoreliminarporducto.php? pidelim=".$idfin."\" class=\"primary-btn cart-btn cart-btn-center\">Eliminar Ultimo Producto</a>";
                    ?>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"> <input name="btnactualizar"type="submit" value="Actualizar Carrito"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php echo $total;?></span></li>
                            *Más el precio del delivey 10 bs
                            <li>Total <span><?php echo $total+10; ?></span></li>
                        </ul>
                        <?php
                       echo" <a href=\"./../../controlador/controladorpagar.php? pidempre=".$_SESSION['empresa']."&pidcliente=".$_SESSION['usuario']."&ptotalapagar=".$total."\" class=\"primary-btn\" onclick=\"return verificar();\">Proceder a comprar</a>";
                        ?>
                    </div>
                </div>
            </div>
            </form>

        </div>
    </section>
    <!-- Shoping Cart Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo text-center">
                            <a href="#"><img src="img/logo.png" style='width:300px;' alt=""></a>
                        </div>
                        <ul class="text-center">
                            <li>Dirección: Mall Brisas, Santa Cruz, Bolivia</li>
                            <li>Telefono: +591 692-21292</li>
                            <li>Correo: deliveryslc@gmial.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Landing Web
                      </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>