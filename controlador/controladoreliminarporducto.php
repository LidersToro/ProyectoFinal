<?php
session_start();
if (is_numeric($_GET['pidelim'])){
	$ideliminproduc = $_GET['pidelim'];
	foreach($_SESSION['carrito'] as $i=>$producto){
		if ($producto['id']==$ideliminproduc){
			unset($_SESSION['carrito'][$i]);
			echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";
		}
	}
}else{
	echo "<script>alert(Error...);</script>";
}

/*echo count($_SESSION['carrito']);
$dim = count($_SESSION['carrito']);
		for($k=0;$k<$dim;$k++)
		{
            if($_SESSION['carrito'][$k]['id'] == $ideliminproduc )
            unset ($_SESSION['carrito'][$k]);
			
		}
	   
      // echo "<script>window.location = './../vista/cliente/shoping-cart.php';</script>";*/