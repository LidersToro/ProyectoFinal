<?php

$user=$_POST['user'];
$contra = $_POST['clave'];
if($user =='lider' && $contra == '1234' || $user =='sebas' && $contra == '1234' || $user =='ceci' && $contra == '1234' ){
     
   
    header("location: /proyectoFinal/vista/dashboard.html");
    
	}else{
	header("location: /proyectoFinal");  
	}