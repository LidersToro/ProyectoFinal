<?php
session_start();
$userid = $_GET['pid'];
require_once __DIR__.'/../modelo/CategoriaModelo.php';
$Obj = new categoria();
$Obj->borrarCategoria($userid);
echo " <script>window.location = '/proyectoFinal/vista/categoriagestion.php';</script>";

?>