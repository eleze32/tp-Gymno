<?php 
require_once("clases/producto.php");
require_once("clases/Conexion.php");

$cod = (isset($_GET['cod']))? trim($_GET['cod']) : null;

$conexion = new ConexionBd();
$conexion->Conectar();

$call_producto = "call productoPorId(".$cod.");";

$resultado_call_producto = $conexion->Consulta($call_producto);

while($datos = $resultado_call_producto->fetch_object()){
	$producto = new Producto();

	$producto->setCodigo($datos->codigo_producto);
	$producto->setNombre($datos->nombre_producto);
	$producto->setPrecioUnidad($datos->precio_unidad);
	$producto->setDescripcion($datos->descripcion);
	$producto->setImagen($datos->imagen);
}

$conexion->Desconectar();

?>