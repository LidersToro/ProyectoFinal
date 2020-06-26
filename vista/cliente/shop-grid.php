<?php
require_once __DIR__.'/../../modelo/EmpresaModelo.php';
session_start();



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
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

   
    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> deliveryslc@gmail.com</li>
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
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
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li><a href="./index.php">Inicio</a></li>
                            <li class="active"><a href="./shop-grid.php">Empresas</a></li>
                            <li><a href="./contact.php">Contáctanos</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="./shoping-cart.php"><i class="fa fa-shopping-bag"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="hero__search">
                        
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+591 6922-1292</h5>
                                <span>Soporte 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Empresas</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Inicio&nbsp;</a>
                            <span>Empresas</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Empresas</h4>
                            <ul>
                            <?php 
                            $Obj1 = new empresa();
                        $aux1 = $Obj1->obtenerTodos();
                       while( $fila1= $aux1->fetch_row())
                       {
                      echo " <li><a href=\"./company-grid.php? pid=$fila1[0]\">$fila1[1]</a></li>";
                       }
                       ?>
                            
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6>Todas las Empresas</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        require_once __DIR__.'/../../modelo/EmpresaModelo.php';
                        $Obj = new empresa();
                        $aux = $Obj->obtenerTodos();
                       while( $fila= $aux->fetch_row())
                       {
print " <div class=\"col-lg-4 col-md-6 col-sm-6\">\n";
print "                            <div class=\"product__item\">\n";
print " <a href=\"./company-grid.php? pid=$fila[0]\">";
echo '                                <div class=\"product__item__pic set-bg\"><img src="data:image/jpeg;base64,'.base64_encode( $fila[7] ).'"height="275" width="300" class="img-thumnail"/>';
print "                                </div></a>\n";
print "                                <div class=\"product__item__text\">\n";
print "                                    <h6><a href=\"./company-grid.php? pid=$fila[0]\">$fila[1]</a></h6>\n";
//print "                                    <h5>Abierto</h5>\n";
print "                                </div>\n";
print "                            </div>\n";
print "                        </div>";

                        
                        }
                        
                        ?>
                              <!--<div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="#">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="./company-grid.html"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="./company-grid.html">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="#"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="#">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <a href="#"><div class="product__item__pic set-bg" data-setbg="img/product/product-1.jpg">
                                </div></a>
                                <div class="product__item__text">
                                    <h6><a href="#">Pollos Kiky - UPSA</a></h6>
                                    <h5>Abierto</h5>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo text-center">
                            <a href="./index.html"><img src="img/logo.png" style='width:300px;' alt=""></a>
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