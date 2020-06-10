<?php
session_start();
$user = $_POST['nombre'];
$clave = $_POST['contra'];
$_SESSION['user'] = $user;
$_SESSION['clave'] = $clave;

require_once __DIR__.'/../modelo/clienteModelo.php';
$Obj = new cliente();
if(isset($_POST['btn_login'])) 
{                      
     $row = $Obj->obtenerCuenta($user,$clave);
     $fila=$row->fetch_row();
            if($fila[1]==$user && $fila[3]==$clave)
            {
            echo " <script>window.location = '/proyectoFinal/vista/cliente/index.php';</script>";
         
            }else
            {
            echo "<script>alert('NOMBRE DE USUARIO O CONTRASENA INCORRECTO!');</script>";
            echo " <script>window.location = '/proyectoFinal/vista/login.html';</script>";
           
            }
     
}

