<?php
session_start();
$userid = $_GET['pid'];
require_once __DIR__.'/../modelo/MotoqueroModelo.php';
$Obj = new Motoquero();
$Obj->borrarMotoquero($userid);
echo " <script>window.location = '/proyectoFinal/vista/motoquerogestion.php';</script>";
?>