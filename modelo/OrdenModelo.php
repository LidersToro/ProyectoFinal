<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class orden{
    private $idOrden;
    private $precioTotal;
    private $estado;
    private $fecha;
    private $idEmpresa;
    private $idCliente;
    private $idMotoquero;




    public function __construct($precTot="",$est="",$fec="",$idEmp="",$idCli="",$idMot="")
    {
        $this->idProducto = 0;
        $this->precioTotal    = $precTot;
        $this->estado    = $est;
        $this->fecha = $fec;
        $this->idEmpresa = $idEmp;
        $this->idCliente    = $idCli;
        $this->idMotoquero    = $idMot;
    }
    public function __destruct()
    {

    }
    public function setIdOrden($idOrd)
    {
        $this->idOrden = $idOrd;
    }
    public function setPrecioTotal($precT)
    {
        $this->precioTotal = $precT;
    }
    public function setEstado($est)
    {
        $this->estado = $est;
    }
    public function setFecha($fec)
    {
        $this->fecha = $fec;
    }
    public function setIdEmpresa($idEmp)
    {
        $this->idEmpresa = $idEmp;
    }
    public function setIdCliente($idCli)
    {
        $this->idCliente = $idCli;
    }
    public function setIdMotoquero($idMot)
    {
        $this->idMotoquero = $idMot;
    }
    


    public function getIdOrden()
    {
      return $this->idOrden;
    }
    public function getPrecioTotal()
    {
      return $this->precioTotal;
    }
    public function getEstado()
    {
      return $this->estado;
    }
    public function getFecha()
    {
      return $this->fecha;
    }
    public function getIdEmpresa()
    {
      return $this->idEmpresa;
    }
    public function getIdCliente()
    {
      return $this->idCliente;
    }
    public function getIdMotoquero()
    {
      return $this->idMotoquero;
    }

   

    public function adicionarOrden()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO orden(precioTotal, estado, fecha, idEmpresa, idCliente, idMotoquero) VALUES(?,?,?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('issiii', $this->precioTotal, $this->estado, $this->fecha, $this->idEmpresa, $this->idCliente, $this->idMotoquero);
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
	  $sql="select max(idProducto) as maximo from producto;";	  
      $conexion = Conectar::conectarBD();
      $rows = $conexion->query($sql);
      $conexion->close();
      return ($rows);
	}
     public function obtenerTodos1($id)
    {
        $sql="SELECT * FROM producto where idCategoria='$id';";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }
     public function obtenerTodosidproduc($id)
    {
        $sql="SELECT * FROM producto where idProducto='$id';";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }

    public function obtenerTodos($estado,$estado1)
    {
        $sql="select * from orden where estado <> '$estado' and estado <> '$estado1';";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }
    public function obtenerProductos($id)
    {
        $sql="SELECT * FROM producto where idEmpresa='$id';";
        $conexion = Conectar::conectarBD();
        $rows = $conexion->query($sql);
        $conexion->close();
        return($rows);
    }
   


    public function modificarOrden($id,$est)
    {
        $conexion = Conectar::conectarBD();//nos conectamos a la base de datos
        if($conexion != false)
        {
            $sql = "UPDATE orden SET estado= '$est' WHERE idOrden= '$id';";
            echo $sql;
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param('is',$id, $est);
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

    public function modificarEstado($criterio,$id,$idOrd)
    {
        $conexion = Conectar::conectarBD();//nos conectamos a la base de datos
        if($conexion != false)
        {
            $sql = "UPDATE orden SET estado = '$criterio', idMotoquero = '$id' WHERE idOrden = '$idOrd';";
            echo $sql;
            $stmt=$conexion->prepare($sql);
            $stmt->bind_param('si',$criterio, $id);
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
        public function borrarProducto($id)
    {
        $sql = "DELETE FROM producto WHERE idProducto='$id';";
        $conexion = Conectar::conectarBD();
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('s',$id);
        if($stmt->execute())
        {
        echo '<script>alert("SE ELIMINO EXITOSAMENTE!")</script>'; 
            $conexion->close();
            return 1;
        }
        else
        {
         echo '<script>alert("NO SE PUEDE ELIMINAR! ERROR!")</script>'; 
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
