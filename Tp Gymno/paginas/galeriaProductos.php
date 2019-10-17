<?php 
	include("clases/producto.php");
	require_once("clases/Conexion.php");

	$pagina = (isset($_POST['pagina']))? trim($_POST['pagina']) : null;
	$tipo = (isset($_POST["tipo"])) ? trim($_POST["tipo"]) : null;
	$paginaActual  = (isset($_POST["num_pagina"])) ? $_POST["num_pagina"] : null;
	$orden = (isset($_POST["orden"])) ? $_POST["orden"] : null;
	$numeroLotes = 4;
	$lista="";
	$galeria = '<div class="row">';

	$conexion = new ConexionBd();
	$conexion->Conectar();

	$call_cantidad_productos = "call CantidadProductoGaleria('".$tipo."','".$pagina."')";
	$resultado_call_cantidad_productos = $conexion->Consulta($call_cantidad_productos);

	while($datos = $resultado_call_cantidad_productos->fetch_object()){
			$cantProductos = $datos->cantidad;
	}

	$conexion->Desconectar();

	$numeroPaginas = ceil($cantProductos / $numeroLotes);

	if($cantProductos > $numeroLotes)
		$lista = crearLista($paginaActual,$numeroPaginas,$orden);

	if($paginaActual <= 1)
		$limite = 0;
	else
		$limite = $numeroLotes * ($paginaActual - 1);

	$conexion2 = new ConexionBd();
	$conexion2->Conectar();

	$call_galeria = "call listarGaleriaProductos($limite,$numeroLotes,'".$tipo."','".$pagina."','".$orden."');";
	$resultado_call_galeria = $conexion2->Consulta($call_galeria);

	while($datos1 = $resultado_call_galeria->fetch_object()){
		$producto = new Producto();

		$producto->setCodigo($datos1->codigo_producto);
		$producto->setNombre($datos1->nombre_producto);
		$producto->setPrecioUnidad($datos1->precio_unidad);
		$producto->setImagen($datos1->imagen);

		$galeria .= $producto->crearImagenProducto();
	}

	$conexion2->Desconectar();

	$galeria .= '</div>';			

	$array = array(0 => $galeria, 1 => $lista);	

	echo json_encode($array);				

	function crearLista($paginaActual,$numeroPaginas,$orden){
		$lista ="";

		if($paginaActual > 1)
				$lista = $lista.'<li><a href="javascript:paginacion('.($paginaActual - 1).',\''.$orden.'\');">Anterior</a></li>';

		for($i = 1; $i <= $numeroPaginas;$i++){
			if($i == $paginaActual)
				$lista =  $lista.'<li class="active"><a href="javascript:paginacion('.$i.',\''.$orden.'\');">'.$i.'</a></li>';
			else
				$lista =  $lista.'<li><a href="javascript:paginacion('.$i.',\''.$orden.'\');">'.$i.'</a></li>';
		}

		if($paginaActual < $numeroPaginas)
			$lista = $lista.'<li><a href="javascript:paginacion('.($paginaActual + 1).',\''.$orden.'\');">Siguiente</a></li>';

		return $lista;
	}

 ?>

