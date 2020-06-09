<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class admin{
    private $idAdmin;v
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
    public function getUsuario()
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
   


    public function modificarUsuario($contra,$usu)
    {
        $conexion = Conectar::conectarBD();//nos conectamos a la base de datos
        if($conexion != false)
        {
            $sql = "UPDATE admin SET contrasena= '$contra' WHERE usuario= '$usu';";
            echo $sql;
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param('ss',$contra, $usu);
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
    public function buscarCuenta($id) {
        $sql = "SELECT * FROM admin WHERE idAdmin='$id';";
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
     public function borrarAdmin($id)
    {
        $sql = "DELETE FROM admin WHERE idAdmin='$id';";
        $conexion = Conectar::conectarBD();
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('s',$id);
        if($stmt->execute())
        {
            $conexion->close();
            return 1;
        }
        else
        {
            $conexion->close();
            return -1;
        }
    }

	
    
}
