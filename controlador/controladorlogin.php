<?php
session_start();
$user = $_POST['nombre'];
$clave = $_POST['contra'];
$_SESSION['user'] = $user;
$_SESSION['clave'] = $clave;

require_once __DIR__.'/../modelo/clienteModelo.php';
require_once __DIR__.'/../modelo/EmpresaModelo.php';
$Obj = new cliente();
$ObjEmp = new empresa();
if(isset($_POST['btn_login'])) 
{                      
     $row = $Obj->obtenerCuenta($user,$clave);
     $rowEmp = $ObjEmp->obtenerCuenta($user,$clave);
     $fila=$row->fetch_row();
     $filaEmp=$rowEmp->fetch_row();
            if($fila[1]==$user && $fila[3]==$clave)
            {
            echo " <script>window.location = '/proyectoFinal/vista/cliente/index.php';</script>";
         
            }else
            {
                if($filaEmp[8]==$user && $filaEmp[3]==$clave)
                {
                echo " <script>window.location = '/proyectoFinal/vista/categoriagestion.php';</script>";
                $_SESSION['id'] = $filaEmp[0];
                }else
                 {
                    echo "<script>alert('NOMBRE DE USUARIO O CONTRASENA INCORRECTO!');</script>";
                    echo " <script>window.location = '/proyectoFinal/vista/login.html';</script>";         
                 }
            }


     
}

