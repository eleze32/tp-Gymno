<?php 
require_once("infoProductoAlquiler.php");

 ?>

<div id="imagen-cabecera">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
				<div class="text-center">
					<h1 ><?php 

						echo 'Combo '.$_GET['combo'];	
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
							<h2 class="text-center">Detalles Combo</h2>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="slide">
									<div class="container-fluid">
										<div class="row">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div id="miSlider" class="carousel slide">
													<ol class="carousel-indicators">
														<li data-target="#miSlide" data-slide-to="0" class="active"></li>
														<li data-target="#miSlide" data-slide-to="1"></li>
														<li data-target="#miSlide" data-slide-to="2"></li>
													</ol>

													<div class="carousel-inner">

														<?php 
															$i = 0;

															while(count($prod) > $i){

																if($i == 0){
														 ?>
														<div class="item active"> 
															<img src="data:image/jpeg;base64,<?php echo base64_encode($prod[$i]["imagen"]);?>" alt="renders"/>
														</div>
														<?php 
															}else{
														?>
														<div class="item"> 
															<img src="data:image/jpeg;base64,<?php echo base64_encode($prod[$i]["imagen"]);?>" alt="renders"/>
														</div>

														<?php 
															}

															$i++;
														}
														?>
													</div>
													<a href="#miSlider" class="left carousel-control" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span></a>
													<a href="#miSlider" class="right carousel-control" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div id="info-prod" class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
								<div class="panel-group" id="accordion">	   
									<?php 
										$i = 0;

										while(count($prod) > $i){
											
											$producto = new Producto();

											$producto->setCodigo($prod[$i]["codigoProducto"]);
											$producto->setNombre($prod[$i]["nombreProducto"]);
											$producto->setPrecioUnidad($prod[$i]["precio"]);
											$producto->setDescripcion($prod[$i]["descripcion"]);

											echo '<div class="panel panel-default">	
												   <div class="panel-heading">
								      				<h4 class="panel-title">
												        <a data-toggle="collapse" data-parent="#accordion" href="#'.preg_replace("[\s+]","", $prod[$i]["nombreProducto"]).'">
												        '.$prod[$i]["nombreProducto"].'</a>
												    </h4>
								  				 </div>
											    <div id="'.preg_replace("[\s+]","", $prod[$i]["nombreProducto"]).'" class="panel-collapse collapse in">
											      <div class="panel-body">'.$producto->mostrarInfoProductoCombo().'</div>
											    </div>
											    </div>';
								    		$i++;
										}
									 ?>
								</div>
								
									<!-- <label for="cantidad" class="text-primary">Seleccione Cantidad: </label>
									<div class="input-group col-lg-4 col-md-4 col-sm-3 col-xs-4">
										<span class="input-group-btn">
											<a class="btn btn-primary" id="menos"><span class="glyphicon glyphicon-minus"></span></a>
										</span>
										<input type="text" class="form-control" id="cantidad"/>
										<span class="input-group-btn">
											<a class="btn btn-primary" id="mas"><span class="glyphicon glyphicon-plus"></span></a>
										</span>
									</div> -->
									<!-- <div class="form-group ">
										<input type="button" value="Agregar a Carrito" class="btn btn-primary agregar-carrito">
									</div>-->
									<div class="form-group ">
										<a href="" class="btn btn-primary agregar-carrito">Agregar a Carriro</a>
									</div>
							</div>
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