<?php
session_start();
$cantidades = array();
$dim = count($_SESSION['carrito']);
for($i=0;$i<$dim;$i++){
	$cantidades[$i] = $_POST['cantidad'.$i];
		
	}


  for($k=0;$k<$dim;$k++){
    $_SESSION['carrito'][$k]['cantidad']=$cantidades[$k] ;
  
  }
  echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";	          








?>