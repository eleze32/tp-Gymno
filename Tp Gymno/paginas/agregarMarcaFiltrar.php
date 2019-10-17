<?php 
	include("clases/marca.php");
	require_once("clases/Conexion.php");

	$tipo = (isset($_POST["tipo"])) ? trim($_POST["tipo"]) : null;
	$lista = "";

	$conexion = new ConexionBd();
	$conexion->Conectar();
	$contador = 0;
	$call_marca = "call listarMarcaFiltrar('".$tipo."');";
	$resultado_call_marca = $conexion->Consulta($call_marca);

	while($datos = $resultado_call_marca->fetch_object()){

		$marca = new marca();				
		$marca->setNombre($datos->nombre);

		$marca->setLista($marca->getNombre());

		$lista.= $marca->getLista();
	}

	$conexion->Desconectar();	

	echo json_encode($lista);

 ?>