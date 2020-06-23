<?php
session_start();
$user = $_POST['nombre'];
$clave = $_POST['contra'];
$_SESSION['user'] = $user;
$_SESSION['clave'] = $clave;

require_once __DIR__.'/../modelo/clienteModelo.php';
require_once __DIR__.'/../modelo/EmpresaModelo.php';
require_once __DIR__.'/../modelo/AdminModelo.php';
require_once __DIR__.'/../modelo/MotoqueroModelo.php';
$Obj = new cliente();
$ObjEmp = new empresa();
$ObjAdm = new admin();
$ObjMot = new motoquero();
if(isset($_POST['btn_login'])) 
{                      
     $row = $Obj->obtenerCuenta($user,$clave);
     $rowEmp = $ObjEmp->obtenerCuenta($user,$clave);
     $rowAdm = $ObjAdm->obtenerCuenta($user,$clave);
     $rowMot = $ObjMot->obtenerCuenta($user,$clave);
     $fila=$row->fetch_row();
     $filaEmp=$rowEmp->fetch_row();
     $filaMot=$rowMot->fetch_row();

     $filaAdm=$rowAdm->fetch_row();
            if($fila[1]==$user && $fila[4]==$clave)
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
                    if($filaMot[9]==$user && $filaMot[3]==$clave)
                        {
                         echo " <script>window.location = '/proyectoFinal/vista/pedidogestion.php';</script>";
                        }
                        else
                        {

                             if($filaAdm[1]==$user && $filaAdm[2]==$clave)
                                {
                                    echo " <script>window.location = '/proyectoFinal/vista/empresagestion.php';</script>";
                                }
                             else
                                {
                                    echo "<script>alert('NOMBRE DE USUARIO O CONTRASENA INCORRECTO!');</script>";
                                    echo " <script>window.location = '/proyectoFinal/vista/login.html';</script>"; 
                                }
                        }
                 }
            }


     
}
$_SESSION['userEmpr']=$filaEmp[1];
$_SESSION['userMot']=$filaMot[1];
$_SESSION['user'] = $fila[2];


