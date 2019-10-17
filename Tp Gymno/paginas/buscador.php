<?php 
include("clases/producto.php");
require_once("clases/Conexion.php");

$pagina = (isset($_POST['pagina']))? trim($_POST['pagina']) : null;
$tipo = (isset($_POST["tipo"])) ? trim($_POST["tipo"]) : null;
$valor  = (isset($_POST["valor"])) ? $_POST["valor"] : null;
$galeria = '<div class="row">';

$conexion = new ConexionBd();
$conexion->Conectar();

$call_buscado = "call listarProductoBuscadoVenta('".$valor."','".$pagina."','".$tipo."');";

$resultado_call_buscado = $conexion->Consulta($call_buscado);

while($datos = $resultado_call_buscado->fetch_object()){
	$producto = new Producto();

	$producto->setCodigo($datos->codigo_producto);
	$producto->setNombre($datos->nombre_producto);
	$producto->setPrecioUnidad($datos->precio_unidad);
	$producto->setImagen($datos->imagen);

	$galeria .= $producto->crearImagenProducto();
}

$conexion->Desconectar();

$galeria .= '</div>';	

echo json_encode($galeria);

?>