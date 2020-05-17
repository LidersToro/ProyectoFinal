<?php
session_start();
$userid = $_GET['pid'];
require_once __DIR__.'/../modelo/AdminModelo.php';
$Obj = new Admin();
$Obj->borrarAdmin($userid);
echo " <script>window.location = '/proyectofinal/vista/useradmin.php';</script>";












?>