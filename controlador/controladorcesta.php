<?php
session_start();

$idProducto = $_GET['pid'];

       if(!$_SESSION['carrito'])
       {
       $producto = array(
         'id'=>$idProducto,
         'cantidad'=>1
          );
       $_SESSION['carrito'][0]= $producto;
       echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
       }
       else{

               $idproductos = array_column($_SESSION['carrito'],'id');
               if(in_array($idProducto,$idproductos)){
                  echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
	           }else{

                 $numerodeproducto = count($_SESSION['carrito']);
                 $producto = array(
                    'id'=>$idProducto,
                    'cantidad'=>1
                     );
                 $_SESSION['carrito'][$numerodeproducto]= $producto;
                 echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
               }
       }
        
       

        