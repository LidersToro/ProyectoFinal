<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class cliente{
    private $idCliente;
    private $nombre;
    private $correo;
    private $direccion;
    private $telefono;
    private $latitud;
    private $longitud;
    private $contrasena;



    public function __construct($nom="",$core="",$dire="",$tele="",$lat="",$lon="",$contra="")
    {
       
        $this->idCliente    = 0;
        $this->nombre       = $nom;
        $this->correo       = $core;
        $this->direccion    = $dire;
        $this->telefono     = $tele;
        $this->latitud      = $lat;
        $this->longitud     = $lon;
        $this->contrasena   = $contra;
        
    }
    public function setIdCliente($valor)
    {
        $this->idCliente = $valor;
    }
    public function setnombre($valor)
    {
        $this->nombre = $valor;
    }
    public function setcorreo($valor)
    {
        $this->correo = $valor;
    }
    public function setdireccion($valor)
    {
        $this->direccion = $valor;
    }
     public function settelefono($valor)
    {
        $this->telefono = $valor;
    }
    public function setlongitud($valor)
    {
        $this->longitud = $valor;
    }
    public function setlatitud($valor)
    {
        $this->latitud = $valor;
    }
    public function setcontrasena($valor)
    {
        $this->contrasena = $valor;
    }




    public function getIdCliente()
    {
      return $this->idCliente;
    }
    public function getnombre()
    {
      return $this->nombre;
    }
    public function getcorreo()
    {
      return $this->correo;
    }
      public function getdireccion()
    {
      return $this->direccion;
    }
    public function gettelefono()
    {
      return $this->telefono;
    }
    public function getlongitud()
    {
      return $this->longitud;
    }
     public function getlatitud()
    {
      return $this->latitud;
    }
      public function getcontrasena()
    {
      return $this->contrasena;
    }
   
    public function adicionarCliente()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO cliente(nombre,correo,direccion,telefono,longitud,latitud,contrasena) VALUES(?,?,?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('sssssss', $this->nombre, $this->correo, $this->direccion, $this->telefono, $this->longitud, $this->latitud, $this->contrasena);
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
        $sql="SELECT * FROM cliente;";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }
     public function obtenerCuenta($usuario1,$contrasena1) {
        $sql = "SELECT * FROM cliente WHERE nombre= '$usuario1' AND contrasena= '$contrasena1';";
         $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return ($rows);
     }
   
   /*

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
    }*/

	
    
}