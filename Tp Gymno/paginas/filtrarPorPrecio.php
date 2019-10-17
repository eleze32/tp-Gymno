<?php 
include("clases/producto.php");
require_once("clases/Conexion.php");

$tipo = (isset($_POST["tipo"])) ? trim($_POST["tipo"]) : null;
$precio = (isset($_POST["precio"])) ? trim($_POST["precio"]) : null;

$galeria = '<div class="row">';

$conexion = new ConexionBd();
$conexion->Conectar();
$contador = 0;
$call_productos = "call filtrarPorPrecio('".$precio."','".$tipo."');";
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