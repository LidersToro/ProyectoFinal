<?php


require_once("ConectarDB.php");//incluye una sola vez el contenido del archivo
class ordenproducto{
    private $idProducto;
    private $idOrden;
    private $cantidad;
    private $precio;
    





    public function __construct($idProd="",$idOrd="",$cant="",$prec="")
    {
        $this->idProducto = $idProd;
        $this->idOrden    = $idOrd;
        $this->cantidad    = $cant;
        $this->precio = $prec;

    }
    public function __destruct()
    {

    }
    public function setIdProducto($idProd)
    {
        $this->idProducto = $idProd;
    }
    public function setIdOrden($idOrd)
    {
        $this->idOrden = $idOrd;
    }
    public function setCantidad($cant)
    {
        $this->cantidad = $cant;
    }
    public function setPrecio($prec)
    {
        $this->precio = $prec;
    }
    
    


    public function getIdProducto()
    {
      return $this->idProducto;
    }
    public function getIdOrden()
    {
      return $this->idOrden;
    }
    public function getCantidad()
    {
      return $this->cantidad;
    }
    public function getPrecio()
    {
      return $this->precio;
    }
   

    public function adicionarOrdenProducto()
    {
        $conexion = Conectar::conectarBD();
        if($conexion !=false)
        {
            $sql = "INSERT INTO ordenproducto(idProducto, idOrden, cantidad, precio) VALUES(?,?,?,?);";
            $stmt = $conexion->prepare($sql);
            $stmt->bind_param('iiii', $this->idProducto, $this->idOrden, $this->cantidad, $this->precio);
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

    public function obtenerTodos($id,$ida)
    {
        $sql="SELECT * FROM producto where idEmpresa='$id' and idCategoria='$ida';";
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
