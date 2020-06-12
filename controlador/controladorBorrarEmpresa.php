<?php
session_start();
$userid = $_GET['pid'];
require_once __DIR__.'/../modelo/EmpresaModelo.php';
$Obj = new Empresa();
$Obj->borrarEmpresa($userid);
echo " <script>window.location = '/proyectoFinal/vista/empresagestion.php';</script>";












?>