<?php
	date_default_timezone_set("America/Argentina/Buenos_Aires");

	class ConexionBd{
		private $servidor;
		private $usuario;
		private $pass;
		private $baseDatos;
		private $conn;

		public function ConexionBd(){
			$this->servidor = "localhost";
			$this->usuario = "root";
			$this->pass = "";
			$this->baseDatos = "gymno";
		}

		/*** Esta funcion conectar retorna 0 si falla y 1 si salte todo correctamente *****/

		public function Conectar() {
			$this->conn = new mysqli($this->servidor,$this->usuario,$this->pass,$this->baseDatos);

			if ($this->conn->connect_error) {
				return false;
			}
			
		    return $this->conn;	
		}

		public function Consulta($consulta){

			if(($resultado = $this->conn->query($consulta)) === false){
				return false;
			}

			return $resultado;
		}

		public function Desconectar(){
			mysqli_close($this->conn);
		}

		public function Siguiente_Resultado(){
			$this->conn->next_result();
		}
	}
?>

			