<?php
    class Carrito
    {
       private $prod=array();
	   private $cant=array();
	  // private $prec=array();
	   private $dim;
	 
	   public function Carrito()
	   {
	      $this->dim = 0;
		}
		public function setDim($f)
	   {
		     $this->dim = $f;
		}
		public function getDim()
	    {
		    return $this->dim;
		}
		public function setElem($elem,$cantidad,$pos)
		{
			$this->prod[$pos]=$elem;
			$this->cant[$pos]=$cantidad;
			
		}
		public function getProducto($pos)
		{
			return $this->prod[$pos]; 
		}
		public function getCantidad($pos)
		{
			return $this->cant[$pos];
		}
		/*public function getPrecio($pos)
		{
			return $this->prec[$pos];
		}*/
		public function Insertar($elem,$cantidad)
		{
			$this->setElem($elem,$cantidad,$this->dim);
			$this->dim++;

		}
		public function Eliminar($pos)
		{
			if($this->dim==1)
			{	$this->setDim(0);}
			else
			{
			for($i=$pos+1;$i<$this->dim;$i++)
			{
				$aux1=$this->getProducto($i);
				$aux2=$this->getCantidad($i);
				$this->setElem($aux1,$aux2,$i-1);
			}
			$this->dim--;
			}
		}
}						  
?>