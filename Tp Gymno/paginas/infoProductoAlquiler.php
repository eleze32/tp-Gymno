<?php 

require_once("clases/producto.php");
require_once("clases/Conexion.php");

$codigo_combo = (isset($_GET['combo']))? trim($_GET['combo']) : null;

$conexion = new ConexionBd();
$conexion->Conectar();
$i = 0;
$call_productoCombo = "call productosPorCombo(".$codigo_combo.");";

$resultado_call_productoCombo = $conexion->Consulta($call_productoCombo);

while($datos = $resultado_call_productoCombo->fetch_object()){
	

	$prod[$i]["codigoProducto"] = $datos->codigo_producto;
	$prod[$i]["nombreProducto"] = $datos->nombre_producto;
	$prod[$i]["precio"] = $datos->precio_unidad;
	$prod[$i]["descripcion"] = $datos->descripcion;
	$prod[$i]["imagen"] = $datos->imagen; 

	$i++;
}

$conexion->Desconectar();

?>
