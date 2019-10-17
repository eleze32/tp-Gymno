<?php 
require_once("infoProducto.php");

 ?>

<div id="imagen-cabecera">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
				<div class="text-center">
					<h1 ><?php 

						echo $_GET['nom-pro'];	
					 ?></h1>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="contenido">
			<div class="container">
				<div class="row">
					<div id="contenido-Principal" class="col-lg-9 col-md-10 col-sm-12 col-xs-12">
						<div class="titulo">
							<h2 class="text-center">Detalles Producto</h2>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="thumbnail thumbnails2">
									<img src="data:image/jpeg;base64,<?php echo base64_encode($producto->getImagen());?>" alt="renders"/>
								</div>
							</div>
							<div id="info-prod" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<?php echo $producto->mostrarInfoProducto(); ?>
								<form action="" role="form">
									<label for="cantidad" class="text-primary">Seleccione Cantidad: </label>
									<div class="input-group col-lg-4 col-md-4 col-sm-3 col-xs-4">
										<span class="input-group-btn">
											<a class="btn btn-primary" id="menos"><span class="glyphicon glyphicon-minus"></span></a>
										</span>
										<input type="text" class="form-control" id="cantidad"/>
										<span class="input-group-btn">
											<a class="btn btn-primary" id="mas"><span class="glyphicon glyphicon-plus"></span></a>
										</span>
									</div>
									<div class="form-group ">
										<input type="button" value="Agregar a Carrito" class="btn btn-primary agregar-carrito">
									</div>
								</form>
							</div>
						</div>
						<div class="titulo hidden-xs">
							<h2 class="text-center">Productos Relacionados en Venta</h2>
						</div>
						<div class="row">
						<?php include("productosRelacionado.php"); ?>	
						</div>
					</div> 
					<div id="contenido-Secundario" class="col-lg-3 col-md-2 col-sm-12 hidden-xs">
						<div class="row">
							<div class="titulo">
								<h2 class="text-center">Enlace</h2>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="thumbnail ">
									<a href="#"><img src="img/propa/publicidad.jpg" alt="renders"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>