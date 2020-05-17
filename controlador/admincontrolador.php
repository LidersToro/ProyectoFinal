<?php
$nombre = $_POST['txtUsuario'];
$contrasena = $_POST['txtClave'];

require_once __DIR__.'/../modelo/AdminModelo.php';
$Obj = new admin();

if(isset($_POST['btnAdicionar']))
{

    
        echo "Se adiciono exitosamente";
        $Obj->setUsuario($_POST['txtUsuario']);
        $Obj->setContrasena($_POST['txtClave']);
        $Obj->adicionarUsuario();
        echo " <script>window.location = '/proyectofinal/vista/useradmin.php';</script>";
}
else
{
echo "error";
}


?>