<?php

	require_once("clases/producto.php");
	require_once("clases/Conexion.php");

	$cod = (isset($_GET['cod']))? trim($_GET['cod']) : null;
	$cont = 0;
	$i = 0;

	$conexion = new ConexionBd();
	$conexion->Conectar();
	
	$call_aleatorio = "call productosPorSubtipo($cod)";
	$resultado_aleatorio = $conexion->consulta($call_aleatorio);
	$productoAl = array();
	while($datos = $resultado_aleatorio->fetch_object()){
		$productoAl[$cont]["codigo"] = $datos->codigo_producto;
		$productoAl[$cont]["nombre"] = $datos->nombre_producto;
		$productoAl[$cont]["precio"] = $datos->precio_unidad;
		$productoAl[$cont]["imagen"] = $datos->imagen;
		$cont++;
	}

	$conexion->Desconectar();

	if(count($productoAl) > 0){
		while($i < 4){
			$aleatorio = rand(0,count($productoAl) - 1);

			$producto_rel = new Producto();

			$producto_rel->setCodigo($productoAl[$aleatorio]["codigo"]);
			$producto_rel->setNombre($productoAl[$aleatorio]["nombre"]);
			$producto_rel->setPrecioUnidad($productoAl[$aleatorio]["precio"]);
			$producto_rel->setImagen($productoAl[$aleatorio]["imagen"]);

			echo $producto_rel->crearImagenProductoAleatorio();
			$i++;
		}
	}else
		echo '<div class="col-xs-12"><p> No hay Productos Relacionado</p></div>'; 	
	
?>
