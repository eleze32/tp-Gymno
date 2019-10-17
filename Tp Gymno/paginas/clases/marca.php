<?php 
	require_once("Conexion.php");

	class marca{
		private $id;
		private $nombre;
		private $lista;

		public function marca(){
			$this->id = 0;
			$this->nombre ="";		
		} 

		public function setId($id){ $this->id = $id; }
		public function getId(){ return $this->id; }

		public function setNombre($nom){ $this->nombre = $nom; }
		public function getNombre(){ return $this->nombre ;}

		public function setLista($marca){ 
			$this->lista = "<li class='list-group-item' id='".$marca."'>".$marca."</li>"; 
		}

		public function getLista(){ return $this->lista ;}

	}

?>