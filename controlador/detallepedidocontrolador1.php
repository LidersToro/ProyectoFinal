<?php
session_start();
//echo $_SESSION['id'];
require_once __DIR__.'/../modelo/OrdenModelo.php';
require_once __DIR__.'/../modelo/MotoqueroModelo.php';
$Obj = new orden();
$ObjMot = new motoquero();
$estado = 'finalizado';

echo $_SESSION['userMot'];
echo $_SESSION['id'];
$aux = $ObjMot->obtenerMotoquero($_SESSION['userMot']);
$fila = $aux->fetch_row();
$Obj->modificarEstado($estado,$fila[0],$_SESSION['id']);
echo " <script>window.location = '/proyectoFinal/vista/motoqueropedidos.php';</script>";












?>