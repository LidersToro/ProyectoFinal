<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class empresa{
    private $idEmpresa;
    private $nombre;
    private $correo;
    private $contrasena;
    private $latitud;
    private $longitud;
    private $telefono;
    private $imagen;



    public function __construct($nom="",$corr="",$contra="",$lat="",$lon="",$tel="",$imag="")
    {
        $this->idEmpresa = 0;
        $this->nombre    = $nom;
        $this->correo    = $corr;
        $this->contrasena = $contra;
        $this->latitud = $lat;
        $this->longitud = $lon;
        $this->telefono = $tel;
        $this->imagen = $imag;
    }
    public function __destruct()
    {

    }
    public function setIdEmpresa($idEmp)
    {
        $this->idEmpresa = $idEmp;
    }
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setCorreo($con)
    {
        $this->correo = $con;
    }
    public function setContrasena($contra)
    {
        $this->contrasena = $contra;
    }
    public function setLatitud($lat)
    {
        $this->latitud = $lat;
    }
    public function setLongitud($lon)
    {
        $this->longitud = $lon;
    }
    public function setTelefono($tel)
    {
        $this->telefono = $tel;
    }
    public function setImagen($imag)
    {
        $this->imagen = $imag;
    }



    public function getIdEmpresa()
    {
      return $this->idEmpresa;
    }
    public function getNombre()
    {
      return $this->nombre;
    }
    public function getCorreo()
    {
      return $this->correo;
    }
    public function getContrasena()
    {
      return $this->contrasena;
    }
    public function getLatitud()
    {
      return $this->latitud;
    }
    public function getLongitud()
    {
      return $this->longitud;
    }
    public function getTelefono()
    {
      return $this->telefono;
    }
    public function getImagen()
    {
      return $this->imagen;
    }
   
    public function adicionarEmpresa()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO empresa(nombre, correo, contrasena, latitud, longitud, telefono, imagen) VALUES(?,?,?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('ssssssb', $this->nombre, $this->correo, $this->contrasena, $this->latitud, $this->longitud, $this->telefono, $this->imagen);
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
      public function ultimoCodigo()	{
	  $sql="select max(idEmpresa) as maximo from empresa;";	  
      $conexion = Conectar::conectarBD();
      $rows = $conexion->query($sql);
      $conexion->close();
      return ($rows);
	}

    public function obtenerTodos()
    {
        $sql="SELECT * FROM empresa;";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }
   


    public function modificarEmpresa($contra,$usu)
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
