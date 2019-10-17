<div id="imagen-cabecera">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="jumbotron">
					<div class="text-center">
						<h1 >Carrito de Compra</h1>
					</div>
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
					<h2 class="text-center">Verificacion de productos</h2>
				</div>
				<div class="table-responsive carrito-compra">
					<table class="table table-hover">
						<thead>
							<tr>
								<th> </th>
								<th class="text-center">Producto</th>
								<th class="text-center">Descripcion</th>
								<th class="text-center">Precio </th>
								<th class="text-center">Cantidad</th>
								<th class="text-center">Total</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i = 0;
								while($i < 4){
								?>
								<tr>
									<td> 
										<a href="#"><span class="glyphicon glyphicon-remove"></span></a>	
									</td>
									<td class="producto-carrito">
										<div class="imagen-prod">
											<img src="img/productos/randers310.jpg" alt="renders">
										</div>
									</td>
									<td>
										<div class="nombre-prod">
											<p class="text-center">NOTEBOOK LENOVO G40 45 E1-6010 2GB/1000 GB</p>
										</div>
									</td>
									<td >
										<div class="precio-prod">
											<p class="text-center">$22213.6</p>
										</div>
									</td>
									<td>
										<div class="cantidad-prod">
											<p class="text-center">2</p>
										</div>
									</td>
									<td>
										<div class="total-prod">
											<p class="text-center">$22213.6</p>
										</div>
									</td>
								</tr>
							<?php
								$i++;			
								}
							?>
						</tbody>
					</table>
				</div>
				<div class="subtotal">
					<p>
						<span class="texto-subtotal">Subtotal</span>
						<span class="precio-subtotal">$220300</span>
					</p>
				</div>
				<div id="pagar">
					<a href="#" class="btn btn-primary">Iniciar Pago</a>
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
