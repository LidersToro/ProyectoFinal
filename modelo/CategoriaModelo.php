<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class categoria{
    private $idCategoria;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $idEmpresa;



    public function __construct($nom="",$desc="",$imag="",$idEmp="")
    {
        $this->idCategoria = 0;
        $this->nombre    = $nom;
        $this->descripcion    = $desc;
        $this->imagen = $imag;
        $this->idEmpresa    = $idEmp;
    }
    public function __destruct()
    {

    }
    public function setIdCategoria($idCat)
    {
        $this->idCategoria = $idCat;
    }
    public function setNombre($nom)
    {
        $this->nombre = $nom;
    }
    public function setDescripcion($desc)
    {
        $this->descripcion = $desc;
    }
    public function setImagen($imag)
    {
        $this->imagen = $imag;
    }
    public function setIdEmpresa($idEmp)
    {
        $this->idEmpresa = $idEmp;
    }
    


    public function getIdCategoria()
    {
      return $this->idCategoria;
    }
    public function getNombre()
    {
      return $this->nombre;
    }
    public function getDescripcion()
    {
      return $this->descripcion;
    }
    public function getImagen()
    {
      return $this->imagen;
    }
    public function getIdEmpresa()
    {
      return $this->idEmpresa;
    }

   
    public function adicionarCategoria()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO categoria(nombre, correo, contrasena, latitud, longitud, telefono, imagen) VALUES(?,?,?,?,?,?,?);";
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
	  $sql="select max(idCategoria) as maximo from categoria;";	  
      $conexion = Conectar::conectarBD();
      $rows = $conexion->query($sql);
      $conexion->close();
      return ($rows);
	}

    public function obtenerTodos($id)
    {
        $sql="SELECT * FROM categoria where idEmpresa='$id';";
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
