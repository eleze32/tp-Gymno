<div id="imagen-cabecera">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
				<div class="text-center">
					<h1 ><?php 

					echo $_GET['tipo-prod'];
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
							<h2 class="text-center">Productos</h2>
						</div>
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<form action="" class="form-horizontal" role="form" id="form-productos">
									<div class="form-group">
										<label for="ordenar" class="col-lg-2 col-md-2 col-sm-12 col-xs-12 control-label">Ordenar por: </label>
										<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
											<select class="form-control" name="ordenar" id="ordenar">
												<option value="mayor">Mayor Precio</option>
												<option value="menor">Menor Precio</option>
												<option value="az">A-Z</option>
												<option value="za">Z-A</option>
												<option value="masVendidos">Mas vendidos</option>
											</select>
										</div>
										<div class="input-group col-lg-4 col-md-4 hidden-sm hidden-xs">
											<input type="text" class="form-control buscador">
											<span class="input-group-btn">
												<button class="btn btn-primary" id="buscar" type="button"><span class="glyphicon glyphicon-search"></span></button>
											</span>
										</div>
									</div>
								</form>
							</div>
						</div>
						
						
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="productos"></div>
						</div>	
						<div class="row">	
							<div class="col-lg-6 col-lg-offset-4 col-md-6 col-md-offset-4 col-sm-6 col-sm-offset-4 col-xs-6 col-xs-offset-4">
								<ul class="pagination" id="paginacion"></ul>
							</div>
						</div>
					</div> 
					<div id="contenido-Secundario" class="col-lg-3 col-md-2 hidden-sm hidden-xs ">
						<div class="row">
							<div class="titulo">
								<h2 class="text-center">Filtrar</h2>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#marca">
									        <i class="fa fa-chevron-right"></i> Marca</a>
									      </h4>
									    </div>
									    <div id="marca" class="panel-collapse collapse in">
									      <div class="panel-body">
									      	<ul class="list-group" id="item-marca">
										        
										     </ul>
									      </div>
									    </div>
									 </div>
									 <div class="panel panel-default">
									    <div class="panel-heading">
									      <h4 class="panel-title">
									        <a data-toggle="collapse" data-parent="#accordion" href="#precio">
									        <i class="fa fa-chevron-right"></i> Precio</a>
									      </h4>
									    </div>
									    <div id="precio" class="panel-collapse collapse in">
									      <div class="panel-body">
									      	<ul class="list-group" id="item-precio">
										        <li class="list-group-item" id="500">$0 a $500</li>
										        <li class="list-group-item" id="1000">$500 a $1000</li>
										        <li class="list-group-item" id="3000">$1000 a $3000</li>
										        <li class="list-group-item" id="4000">$3000 a $4000</li>
										        <li class="list-group-item" id="6000">$4000 a $6000</li>
										        <li class="list-group-item" id="8000">$6000 a $8000</li>
										        <li class="list-group-item" id="8001">más de $8000</li>
										     </ul>
									      </div>
									    </div>
									 </div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="titulo">
								<h2 class="text-center">Enlace</h2>
							</div>
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<div class="thumbnail">
									<a href="#"><img src="img/propa/publicidad.jpg" alt="renders"></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> 
		</div>