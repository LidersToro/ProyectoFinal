<?php
session_start();
require_once __DIR__.'/../../modelo/CategoriaModelo.php';
$idEmpresa = $_GET['pid'];
//echo $idEmpresa;
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
                    <div class="col-lg-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> deliveryslc@gmail.com</li>
                                
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
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <span>Empresas Top</span>
                        </div>
                        <ul>
                            <li><a href="#">Casa de Camba - Makro</a></li>
                            <li><a href="#">Pollos Kiky - UPSA</a></li>
                            <li><a href="#">Tipical Chef - Makro</a></li>
                            <li><a href="#">Cabernet - UPSA</a></li>
                            <li><a href="#">Bitsacream - Makro</a></li>
                            <li><a href="#">Burguer King - Makro</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    Todas las Empresas 
                                </div>
                                <input type="text" placeholder="¿Qué Empresa busca?">
                                <button type="submit" class="site-btn">Buscar</button>
                            </form>
                        </div>
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
                            <a href="./index.html">Inicio&nbsp;</a>
                            <a href="./shop-grid.html"><span>Empresa&nbsp;</span></a>
                            <span>Nombre de la empresa</span>
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
                            <h4>Categorias de la empresa</h4>
                            <?php
                            require_once __DIR__.'/../../modelo/CategoriaModelo.php';
                            $Obj = new categoria();
                            $aux = $Obj->obtenerTodos($idEmpresa);
                            $a=0;
                            ?>
                            <ul>
                                <?php 
                                while($fila=$aux->fetch_row())
                                {
                                print "<li><a href=\"#combos\">$fila[1] </a></li>";
                                $a++;

                                }
                                ?>
                            <!--<li><a href="#combos">Combos </a></li>
                            <li><a href="#productos">Productos </a></li>
                            <li><a href="#bebidas">Bebidas </a></li>
                            <li><a href="#postres">Postres</a></li>-->
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
                                    <a name="combos"><h6>Combos</h6></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <a name="productos"><h6>Productos</h6></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <a name="bebidas"><h6>Bebidas</h6></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <a name="postres"><h6>Postres</h6></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="img/product/product-2.jpg">
                                <ul class="product__item__pic__hover">
                                       <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="#">1/4 de pollo a la Broaster - Pierna</a></h6>
                                    <h5>Bs 25</h5>
                                </div>
                            </div>
                        </div>
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