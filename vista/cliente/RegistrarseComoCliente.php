﻿<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <script src="http://maps.google.com/maps/api/js?libraries=places&region=uk&language=en&sensor=true"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
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

            if (myForm.contra.value != myForm.contra1.value) {
                alert("No Coinciden las contrasenas!");
                return false;
            }
            return true;
        }
    </script>


    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>REGISTRATE COMO USUARIO AQUI</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Inicio</a>
                            <span>Registrate</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">

            <div class="checkout__form">
                <h4>DETALLES DE TU CUENTA</h4>
                <form action="RegistrarseComoCliente.php" name="myForm"  method="POST">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nombre de Usuario<span>*</span></p>
                                        <input type="text" name="nombre" required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Correo<span>*</span></p>
                                        <input type="email" name="correo" required>
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Dirección<span>*</span></p>
                                <input type="text" name="direccion"required>
                            </div>
                            <div class="checkout__input">
                                <p>Teléfono<span>*</span></p>
                                <input type="text" name="telefono" required>
                            </div>
                            <div class="checkout__input">
                                <p>Contraseña<span>*</span></p>
                                <input type="password" name="contra" placeholder="Escribe una contraseña" required>
                                <br /><br />
                                <input type="password" name="contra1" placeholder="Reescribe tu misma contraseña" required>
                            </div>
                            <div class="checkout__input">
                                <p>Dirección GPS<span>*</span></p>
                                <input type="text" name="latitud" class="MapLat" placeholder="Latitud" readonly required>
                                <br /><br />
                                <input type="text" name="longitud" class="MapLon" placeholder="Logitud" readonly required>
                                <div id="map_canvas" style="height: 350px;width: 500px;margin: 0.6em;"></div>
                            </div>
                            <div class="text-right">
                             <input type="submit" name ="btnAdicionar" class="site-btn te" value="Registrar Nuevo Cliente" onclick="return verificar();"> 
                            </div>
                        </div>
                    </div>
                </form>
                <?php
                
                if(isset($_POST['btnAdicionar']))
                {
                
                require_once __DIR__.'/../../modelo/clienteModelo.php';
                $Obj = new cliente();
                echo "<script>alert('SE ADICIONO EXITOSAMENTE');</script>";
                $Obj->setnombre($_POST['nombre']);
                $Obj->setcorreo($_POST['correo']);
                $Obj->setdireccion($_POST['direccion']);
                $Obj->settelefono($_POST['telefono']);
                $Obj->setlongitud($_POST['latitud']);
                $Obj->setlatitud($_POST['longitud']);
                $Obj->setcontrasena($_POST['contra']);
                $Obj->adicionarCliente();
                echo "<script>window.location = '/proyectofinal/vista/login.html';</script>";
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->



    <script>
      $(function () {
          var markers = [];
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
         var autocomplete = new google.maps.places.Autocomplete(input, {
             types: ["geocode"]
         });

         autocomplete.bindTo('bounds', map);
          var infowindow = new google.maps.InfoWindow();

              google.maps.event.addListener(marker, 'dragend', function () {
                  var lat = marker.getPosition().lat();
                  var lng = marker.getPosition().lng();
                  $('.MapLat').val(lat);
                  $('.MapLon').val(lng);
         });

          
        
         function moveMarker(placeName, latlng) {
             marker.setIcon(image);
             marker.setPosition(latlng);
             infowindow.setContent(placeName);
          }
     }); 

    
</script>




    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="img/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Address: 60-49 Road 11378 New York</li>
                            <li>Phone: +65 11.188.888</li>
                            <li>Email: hello@colorlib.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Useful Links</h6>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">About Our Shop</a></li>
                            <li><a href="#">Secure Shopping</a></li>
                            <li><a href="#">Delivery infomation</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Our Sitemap</a></li>
                        </ul>
                        <ul>
                            <li><a href="#">Who We Are</a></li>
                            <li><a href="#">Our Services</a></li>
                            <li><a href="#">Projects</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Innovation</a></li>
                            <li><a href="#">Testimonials</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Join Our Newsletter Now</h6>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                        <div class="footer__copyright__payment"><img src="img/payment-item.png" alt=""></div>
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