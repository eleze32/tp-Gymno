<?php 
	
	class tipo_producto{
		private $id;
		private $nombre;

		public function tipo_producto(){
			$this->id = 0;
			$this->nombre ="";
		} 

		public function setId($id){ $this->id = $id; }
		public function getId(){ return $this->id; }
		public function setNombre($nom){ $this->nombre = $nom; }
		public function getNombre(){ return $this->nombre ;}

		public function agregarProductoALista(){
			$lista = "";

			$lista .= '<li ><a href="?page=productos&tipo-prod='.$this->nombre.'"><i class="fa fa-chevron-right"></i>'.strtoupper($this->nombre).'</a></li>';

			return $lista;
		}
	}

 ?>