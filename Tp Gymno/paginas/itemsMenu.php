<?php 

require_once("clases/tipo_producto.php");
require_once("clases/Conexion.php");

$conexion = new ConexionBd();
$conexion->Conectar();
$lista = "";
$i = 0;

$call_tipoProducto = "call listarTiposProductos();";
$resultado_call_tipoProducto = $conexion->Consulta($call_tipoProducto);

if($datos = $resultado_call_tipoProducto->fetch_object()){
	$ultimo_tipo = $datos->Tipo; 
	do{
		if($ultimo_tipo == $datos->Tipo)
		{	
			$submenu[$datos->Tipo][$i] = $datos->subtipo;
		}else{
			$ultimo_tipo = $datos->Tipo;
			$submenu[$datos->Tipo][$i] = $datos->subtipo;
		}
		$i++;		
	}while($datos = $resultado_call_tipoProducto->fetch_object());
}

$conexion->Desconectar();

$tipo = array_keys($submenu);
$j = 0; 

foreach ($submenu as $tipos) {
	$i = 0;
	
	foreach ($tipos as $subtipos) {
		if($i == 0){
			
			$lista .= '<li > <a href="#"><i class="fa fa-chevron-right"></i>'.$tipo[$j].'</a>

					<ul class="dropdown-menu">';
			$i++;
			$j++;
		}
		
		$lista .= '<li ><a href="?page=productos&tipo-prod='.utf8_encode(strtoupper($subtipos)).'"><i class="fa fa-chevron-right"></i>'.utf8_encode(strtoupper($subtipos)).'</a></li>';	
	}

	$lista.= '</ul> </li>';
}

echo $lista;
?>