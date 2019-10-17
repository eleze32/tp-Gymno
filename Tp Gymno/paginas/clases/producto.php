<?php
	require_once("marca.php");
	require_once("subtipo_producto.php");

	class Producto{
		private $codigo;
		private $nombre;
		private $stock;
		private $precio_unidad;
		private $descripcion;
		private $imagen;
		private $marca;
		private $subtipo;

		public function Producto(){
			$this->codigo = 0;
			$this->nombre = "";
			$this->stock = 0;
			$this->precio_unidad = 0.0;
			$this->descripcion= "";			
			$this->imagen = "";
			$this->marca = new marca();
			$this->subtipo= new subtipo();
		}

		public function setCodigo($cod){ $this->codigo = $cod; }
		public function getCodigo(){ return $this->codigo; }

		public function setNombre($nom){ $this->nombre = $nom; }
		public function getNombre(){ return $this->nombre ;}

		public function setStock($stock){ $this->stock = $stock; }
		public function getStock(){ return $this->stock ;}

		public function setPrecioUnidad($precio){ $this->precio_unidad = $precio; }
		public function getPrecioUnidad(){ return $this->precio_unidad ;}

		public function setDescripcion($desc){ $this->descripcion = $desc; }
		public function getDescripcion(){ return $this->descripcion ; }

		public function setImagen($img){ $this->imagen = $img; }
		public function getImagen(){ return $this->imagen ; }

		public function setMarca($marca){ $this->marca->setId($marca); }
		public function getMarca(){ return $this->marca->getId(); }

		public function setSubTipo($sub){ $this->subtipo->setId($sub); }
		public function getSubTipo(){ return $this->subtipo->getId(); }

		private function separarTextoPorPunto($texto){
			$text = explode('.', $texto);
			return $text;
		}

		private function recortar_texto($texto, $limite){
			$marca = "...";

			if(strlen($texto) > $limite){
				$texto = wordwrap($texto,$limite,$marca);
				$texto = explode($marca, $texto);
				$texto = $texto[0].$marca;
			}

			return $texto;
		}

		public function crearImagenProducto(){

			$imagen = '
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<div class="thumbnail">
									<img src="data:image/jpeg;base64,'.base64_encode($this->imagen).'" alt="renders"/>
									<div class="caption">
								 		<h4>'.$this->recortar_texto(utf8_encode($this->nombre),30).'</h4>
										<p class="precio"> $'.$this->precio_unidad.' </p>
										<a href="?page=detalleproducto&nom-pro='.utf8_encode($this->nombre).'&cod='.$this->codigo.'" class="btn btn-primary" role="button">Ver Info..</a>
								 	</div>	
								</div>
							</div>
					   	
					  ';

			return $imagen;		
		}

		public function mostrarInfoProducto(){

			$texto = $this->separarTextoPorPunto($this->descripcion);

			$descripcion = '';

			foreach ($texto as $text) {
					$descripcion .= '<p class="detalle-prod">'.utf8_encode($text).'.</p>';
			}

			$info = '<h3 class="bold">'.utf8_encode($this->nombre).'</h3>'
								.$descripcion.
								'<p><span class="bold text-info">Codigo:</span> '.$this->codigo.'</p>
								<p class="text-info">PRECIO ONLINE</p>
								<p class="lead text-info bold precio-detalle">$'.$this->precio_unidad.'</p>';
			return $info;
		}

		public function mostrarInfoProductoCombo(){

			$texto = $this->separarTextoPorPunto($this->descripcion);

			$descripcion = '';

			foreach ($texto as $text) {
					$descripcion .= '<p class="detalle-prod">'.utf8_encode($text).'.</p>';
			}

			$info = '<h5 class="bold">'.utf8_encode($this->nombre).'</h5>'
								.$descripcion;
			return $info;
		}

		public function crearImagenProductoAleatorio(){

			$imagen = '
							<div class="col-lg-3 col-md-3 col-sm-4 hidden-xs">
								<div class="thumbnail">
									<img src="data:image/jpeg;base64,'.base64_encode($this->imagen).'" alt="renders"/>
									<div class="caption">
								 		<h4>'.$this->recortar_texto(utf8_encode($this->nombre),23).'</h4>
										<p class="precio"> $'.$this->precio_unidad.' </p>
										<a href="?page=detalleproducto&nom-pro='.utf8_encode($this->nombre).'&cod='.$this->codigo.'" class="btn btn-primary" role="button">Ver Info..</a>
								 	</div>	
								</div>
							</div>
					   	
					  ';

			return $imagen;		
		}

		public function crearProductoCombo(){

			$imagen = '
							<div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
								<div class="thumbnail">
									<img src="data:image/jpeg;base64,'.base64_encode($this->imagen).'" alt="renders"/>
									<div class="caption">
								 		<h4>'.$this->recortar_texto(utf8_encode($this->nombre),30).'</h4>
										<p class="precio"> $'.$this->precio_unidad.' </p>
								 	</div>	
								</div>
							</div>
					   	
					  ';

			return $imagen;		
		}

}
?>
