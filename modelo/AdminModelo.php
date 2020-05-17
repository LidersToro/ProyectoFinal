<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class admin{
    private $idAdmin;
    private $usuario;
    private $contrasena;



    public function __construct($usu="",$con="")
    {
        $this->idAdmin = 0;
        $this->usuario    = $usu;
        $this->contrasena = $con;
    }
    public function __destruct()
    {

    }
    public function setIdAdmin($idAdm)
    {
        $this->idAdmin = $idAdm;
    }
    public function setUsuario($usu)
    {
        $this->usuario = $usu;
    }
    public function setContrasena($con)
    {
        $this->contrasena = $con;
    }



    public function getIdAdmin()
    {
      return $this->idAdmin;
    }
    public function geUsuario()
    {
      return $this->usuario;
    }
    public function getContrasena()
    {
      return $this->contrasena;
    }
   
    public function adicionarUsuario()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO admin(usuario, contrasena) VALUES(?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('ss', $this->usuario, $this->contrasena);
            if($stmt->execute())
            {
                return(true);

            }
            else
            {
                return(false);
            }
            $conexion->close();
        }
    }


    public function obtenerTodos()
    {
        $sql="SELECT * FROM admin;";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }
   


    public function modificarUsuario($usu , $con)
    {
        $conexion = Conectar::conectarBD();//nos conectamos a la base de datos
        if($conexion != false)
        {
            $sql = "UPDATE admin SET contrasena = $con  WHERE usuario= '$usu';";
          
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param('ss',$con ,$usu);
            if($stmt->execute())
            {
                $conexion->close();
                return (true);

            }
            else
            {
                $conexion->close();
                return (false);
            }

        }

    }
    public function obtenerCuenta($usuario="",$contrasena="") {
        $sql = "SELECT * FROM admin WHERE usuario= '$usuario' AND contrasena= '$contrasena';";
         $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return ($rows);
     }
     public function ultimoCodigo()	{
	  $sql="select max(idAdmin) as maximo from admin;";	  
      $conexion = Conectar::conectarBD();
      $rows = $conexion->query($sql);
      $conexion->close();
      return ($rows);
	}

	
    
}
