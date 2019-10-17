<?php 
	
	include_once("producto.php");

	class producto_venta extends Producto{
		private $cantidad_vendidos;

		public function producto_venta(){
			parent::Producto();
			$this->cantidad_vendidos = 0;
		} 

		public function setCantidadVendidos($cant){ $this->cantidad_vendidos = $cant; }
		public function getCantidadVendidos(){ return $this->cantidad_vendidos; }

		public function setCantidadProductos($cant){ $this->cantidad_productos = $cant; }
		public function getCantidadProductos(){ return $this->cantidad_productos; }

	} 

 ?>