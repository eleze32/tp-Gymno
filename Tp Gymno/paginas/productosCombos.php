<?php 
	require_once("clases/producto.php");
	require_once("clases/Conexion.php");

	$conexion = new ConexionBd();
	$conexion->Conectar();
	$i = 0;
	$call_combos = "call listaProductosCombo();";
	$resultado_call_combos = $conexion->Consulta($call_combos);
	
	while ($datos = $resultado_call_combos->fetch_object()) {
		
		$datos_tabla[$i]["nombreCombo"] = $datos->nombre;
		$datos_tabla[$i]["codigoCombo"] = $datos->codigo_combo;
		$datos_tabla[$i]["nombreProducto"] = $datos->nombre_producto;
		$datos_tabla[$i]["precio"] = $datos->precio_unidad;
		$datos_tabla[$i]["imagen"] = $datos->imagen;
		$i++;
	}
	$conexion->Desconectar();
	
	$nombre_combos = array_unique(array_column($datos_tabla, "nombreCombo"));

	echo '<div class="row">';
	$i = 0;


	foreach ($nombre_combos as $key => $value) {

		$i = 0;
		$subtotal = 0;
		echo '<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="panel panel-default">
                 <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#'.preg_replace("[\s+]","", $value).'">
                        '.$value.'</a>
                    </h4>
                  </div>
                  <div id="'.preg_replace("[\s+]","", $value).'" class="panel-collapse collapse in">
                      <div class="panel-body">';
		
		while(count($datos_tabla) > $i){
			
			if($datos_tabla[$i]["nombreCombo"] == $value){
				$producto = new Producto();

				$producto->setNombre($datos_tabla[$i]["nombreProducto"]);
				$producto->setPrecioUnidad($datos_tabla[$i]["precio"]);
				$producto->setImagen($datos_tabla[$i]["imagen"]);
				echo $producto->crearProductoCombo();

				$subtotal += $producto->getPrecioUnidad(); 

				$id_combo = $datos_tabla[$i]["codigoCombo"];
			}

			$i++;
		}                      
		$total = $subtotal - $subtotal * 0.2;

		echo '<div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12 text-center"><p class="precioAlquiler">Precio Total: $'.$total.'</p></div>';    	
        echo '<div class="col-lg-12 col-ms-12 col-sm-12 col-xs-12 text-center"><a class="btn btn-primary" href="?page=detalleCombo&combo='.$id_combo.'">Ver Info...</a></div>';    	                              
        echo'</div>
        	</div>
              </div>
              </div>';
	}
	

	echo '</div>';
	
	
?>