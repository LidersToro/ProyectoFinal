<?php
session_start();
$userid = $_GET['pid'];
require_once __DIR__.'/../modelo/ProductoModelo.php';
$Obj = new producto();
$Obj->borrarProducto($userid);
echo " <script>window.location = '/proyectoFinal/vista/productogestion.php';</script>";

?>