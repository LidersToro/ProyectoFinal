<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class motoquero{
    private $idMotoquero;
    private $nombre;
    private $correo;
    private $contrasena;
    private $CI;
    private $placa;
    private $estado;
    private $imagen;
    private $telefono;



    public function __construct($nom="",$corr="",$contra="",$C="",$plac="",$est="",$imag="",$tel="")
    {
        $this->idMotoquero = 0;
        $this->nombre    = $nom;
        $this->correo    = $corr;
        $this->contrasena = $contra;
        $this->CI = $C;
        $this->placa = $plac;
        $this->estado = $est;
        $this->imagen = $imag;
        $this->telefono = $tel;
    }
    public function __destruct()
    {

    }
    public function setIdMotoquero($idMot)
    {
        $this->idMotoquero = $idMot;
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
    public function setCI($c)
    {
        $this->CI = $c;
    }
    public function setPlaca($plac)
    {
        $this->placa = $plac;
    }
    public function setEstado($est)
    {
        $this->estado = $est;
    }
    public function setImagen($imag)
    {
        $this->imagen = $imag;
    }
    public function setTelefono($tel)
    {
        $this->telefono = $tel;
    }



    public function getIdMotoquero()
    {
      return $this->idMotoquero;
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
    public function getCI()
    {
      return $this->CI;
    }
    public function getPlaca()
    {
      return $this->placa;
    }
    public function getEstado()
    {
      return $this->estado;
    }
    public function getImagen()
    {
      return $this->imagen;
    }
   public function getTelefono()
    {
      return $this->telefono;
    }
    public function adicionarMotoquero()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO motoquero(nombre, correo, contrasena, CI, placa, estado, imagen, telefono) VALUES(?,?,?,?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('sssssss', $this->nombre, $this->correo, $this->contrasena, $this->latitud, $this->longitud, $this->telefono, $this->imagen);
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
        public function insertarImagen($id,$img)
    {
        $conexion = Conectar::conectarBD();//nos conectamos a la base de datos
        if($conexion != false)
        {
            $sql = "UPDATE empresa SET imagen= '$img' WHERE idEmpresa= '$id';";
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param('sb',$id, $img);
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
      public function obtenerEmpleado($id)	{
	  $sql="select * from empresa where idEmpresa='$id';";	  
      $conexion = Conectar::conectarBD();
      $rows = $conexion->query($sql);
      $conexion->close();
      return ($rows);
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
        public function borrarEmpresa($id)
    {
        $sql = "DELETE FROM empresa WHERE idEmpresa='$id';";
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
    public function obtenerDireccion($id) {
        $sql = "SELECT latitud,longitud FROM empresa WHERE idEmpresa= '$id';";
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
