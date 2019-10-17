<?php 
	require_once("tipo_producto.php");

	class subtipo{
		private $id;
		private $nombre;
		private $tipo_producto;

		public function subtipo(){
			$this->id = 0;
			$this->nombre ="";
			$this->tipo_producto = new tipo_producto();
		} 

		public function setId($id){ $this->id = $id; }
		public function getId(){ return $this->id; }
		public function setNombre($nom){ $this->nombre = $nom; }
		public function getNombre(){ return $this->nombre ;}
		public function setTipoProducto($tipo){ $this->tipo_producto->setId($tipo); }
		public function getTipoProducto(){ return $this->tipo_producto->getId() ;}

	}

 ?>