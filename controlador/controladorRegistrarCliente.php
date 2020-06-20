<?php
                
                if(isset($_POST['btnAdicionar']))
                {
                    
                    require_once __DIR__.'/../modelo/clienteModelo.php';
                    $Obj1 = new cliente();
                    $fila = $Obj1->buscarRepetidos1($_POST['usuario']);
                    $fila = $fila->fetch_row();
                                
                    
                        if ($fila[0] >=1)
                        {
                           
                           echo "<script>alert('Ya existe este USUARIO');</script>";    
                           echo "<script>window.location = '/proyectoFinal/vista/cliente/RegistrarseComoCliente.php';</script>";
				        }
                        else
                        {
                             require_once __DIR__.'/../../modelo/clienteModelo.php';
				             $Obj = new cliente();
                             echo "<script>alert('SE ADICIONO EXITOSAMENTE');</script>";
                                    $Obj->setnombre($_POST['nombre']);
                                    $Obj->setusuario($_POST['usuario']);
                                    $Obj->setcorreo($_POST['correo']);
                                    $Obj->setdireccion($_POST['direccion']);
                                    $Obj->settelefono($_POST['telefono']);
                                    $Obj->setlatitud($_POST['latitud']);
                                    $Obj->setlongitud($_POST['longitud']);
                                    $Obj->setcontrasena($_POST['contra']);
                                    $Obj->adicionarCliente();
                                    echo "<script>window.location = '/proyectoFinal/vista/login.html';</script>";
                        }
                }
