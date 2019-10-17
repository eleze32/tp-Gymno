<?php 
	include("clases/producto.php");
	include("clases/producto_venta.php");
	require_once("clases/Conexion.php");

	$tipo = (isset($_POST["tipo"])) ? trim($_POST["tipo"]) : null;
	$marca = (isset($_POST["marca"])) ? trim($_POST["marca"]) : null;

	$galeria = '<div class="row">';

	$conexion = new ConexionBd();
	$conexion->Conectar();
	$contador = 0;
	$call_productos = "call filtrarPorMarca('".$marca."','".$tipo."');";
	$resultado_call_productos = $conexion->Consulta($call_productos);

	while($datos = $resultado_call_productos->fetch_object()){
		$producto = new Producto();

		$producto->setCodigo($datos->codigo_producto);
		$producto->setNombre($datos->nombre_producto);
		$producto->setPrecioUnidad($datos->precio_unidad);
		$producto->setImagen($datos->imagen);

		$galeria .= $producto->crearImagenProducto();
	}
	$galeria .= '</div>';
	$conexion->Desconectar();	

	echo json_encode($galeria);
 ?>