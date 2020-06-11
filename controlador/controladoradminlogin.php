<?php
session_start();
$user = $_POST['user'];
$clave = $_POST['clave'];
$_SESSION['user'] = $user;
$_SESSION['clave'] = $clave;

require_once __DIR__.'/../modelo/AdminModelo.php';
$Obj = new Admin();
if(isset($_POST['btn_login'])) 
{
     if((isset($_POST['user'])) && (isset($_POST['clave'])))
     {                       
     $row = $Obj->obtenerCuenta($user,$clave);
     $fila=$row->fetch_row();
            if($fila[1]==$_POST['user']&&$fila[2]==$_POST['clave'])
            {
             echo " <script>window.location = '/proyectoFinal/vista/empresagestion.php';</script>";
            // echo " <script>window.location = '/proyectofinal/vista/dashboardadmin.php';</script>";
          //   header("location: /proyectoFinal/vista/dashboardadmin.php");
            }else
            {
            echo "<script>alert('NOMBRE DE USUARIO O CONTRASENA INCORRECTO!');</script>";
            echo " <script>window.location = '/proyectoFinal/vista/adminlogin.php';</script>";
            // header("location: /proyectoFinal/vista/adminlogin.php");
            }
     }
}

if(isset($_POST['btn_registrar'])) 
{
echo " <script>window.location = '/proyectoFinal/vista/RegistraseComoCliente.php';</script>";

}





?>