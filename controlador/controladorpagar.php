<?php
session_start();
require_once __DIR__.'./../modelo/OrdenModelo.php';
require_once __DIR__.'./../modelo/clienteModelo.php';
$idempresa = $_GET['pidempre'];
$usuario = $_GET['pidcliente'];
$total =  $_GET['ptotalapagar'];
$fecha = date("Y-m-d");
$estado = "espera";
$cliente = new cliente();
$clien = $cliente->obtenerid($usuario);
$idclienterow = $clien->fetch_row();



$orden = new orden();
$orden->setPrecioTotal($total);
$orden->setEstado($estado);
$orden->setFecha($fecha);
$orden->setIdEmpresa($idempresa);
$orden->setIdCliente($idclienterow[0]);
$orden->adicionarOrden();
  $dim = count($_SESSION['carrito']);
              if($dim>=0)
	 	      {
                     for($k=0;$k<$dim;$k++)
			         {
                          require_once __DIR__.'./../modelo/ProductoModelo.php';
                          require_once __DIR__.'./../modelo/OrdenProductoModelo.php';
                          
                          $id = $_SESSION['carrito'][$k]['id'];
                          $cantidad = $_SESSION['carrito'][$k]['cantidad'];
                          $Obj = new producto();
                          $Obj1 = new orden();
                          $Obj3 = new ordenproducto();
                          $aux1 =$Obj1->obteneridorden($idempresa);
                          $fila1= $aux1->fetch_row();
                          $idorden =$fila1[0];
                          $aux = $Obj->obtenerTodosidproduc($id);
                          $fila= $aux->fetch_row();
                          $precio=$fila[3];
                          $subtotal=$precio*$cantidad;
                          $Obj3->setIdOrden($idorden);
                          $Obj3->setIdProducto($id);
                          $Obj3->setCantidad($cantidad);
                          $Obj3->setPrecio($subtotal);
                          $Obj3->adicionarOrdenProducto();
                     }
              }

              foreach($_SESSION['carrito'] as $i=>$producto){
                unset($_SESSION['carrito'][$i]);
              }
            //  $_SESSION['carrito']="";
             echo "<script>window.location = './../vista/cliente/index.php';</script>";




?>