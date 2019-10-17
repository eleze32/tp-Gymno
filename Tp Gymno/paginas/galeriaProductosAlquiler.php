<?php  

	require_once("clases/producto.php");
	require_once("clases/Conexion.php");

	$paginaActual  = (isset($_POST["num_pagina"])) ? $_POST["num_pagina"] : null;
	$numeroLotes = 4;
	$lista="";
	$galeria = '<div class="row">';

	$conexion = new ConexionBd();
	$conexion->Conectar();

	$call_cantidad_productos = "call cantidadProductoAlquiler()";
	$resultado_call_cantidad_productos = $conexion->Consulta($call_cantidad_productos);

	while($datos = $resultado_call_cantidad_productos->fetch_object()){
			$cantProductos = $datos->cantidad;
	}

	$conexion->Desconectar();

	$numeroPaginas = ceil($cantProductos / $numeroLotes);

	if($cantProductos > $numeroLotes)
		$lista = crearLista($paginaActual,$numeroPaginas);

	if($paginaActual <= 1)
		$limite = 0;
	else
		$limite = $numeroLotes * ($paginaActual - 1);

	$conexion2 = new ConexionBd();
	$conexion2->Conectar();

	$call_galeria = "call listarProductoAlquiler($limite,$numeroLotes);";
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

	function crearLista($paginaActual,$numeroPaginas){
		$lista ="";

		if($paginaActual > 1)
				$lista = $lista.'<li><a href="javascript:paginacionAlquiler('.($paginaActual - 1).');">Anterior</a></li>';

		for($i = 1; $i <= $numeroPaginas;$i++){
			if($i == $paginaActual)
				$lista =  $lista.'<li class="active"><a href="javascript:paginacionAlquiler('.$i.');">'.$i.'</a></li>';
			else
				$lista =  $lista.'<li><a href="javascript:paginacionAlquiler('.$i.');">'.$i.'</a></li>';
		}

		if($paginaActual < $numeroPaginas)
			$lista = $lista.'<li><a href="javascript:paginacionAlquiler('.($paginaActual + 1).');">Siguiente</a></li>';

		return $lista;
	}

?>