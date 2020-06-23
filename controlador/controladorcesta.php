<?php
session_start();
$idProducto = $_GET['pid'];
$ideliminproduc =$_GET['pidelim'];
       if(!$_SESSION['carrito'])
       {
       $producto = array(
         'id'=>$idProducto,
         'cantidad'=>1
          );
       $_SESSION['carrito'][0]= $producto;
       echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
       }else {
         $numerodeproducto = count($_SESSION['carrito']);
         $producto = array(
            'id'=>$idProducto,
            'cantidad'=>1
             );
         $_SESSION['carrito'][$numerodeproducto]= $producto;
         echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
       }
        foreach($_SESSION['carrito'] as $indice=>$producto){
        if($producto['id'] == $ideliminproduc ){
            unset ($_SESSION['carrito'][$indice]);
            echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
		}
	   }


        