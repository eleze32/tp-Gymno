<?php header("Content-Type: text/html;charset=utf-8"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.smartmenus.min.js"></script>
	<script type="text/javascript" src="js/jquery.smartmenus.bootstrap.min.js"></script>
	<script type="text/javascript" src="js/funciones.js"></script>
	<link href='https://fonts.googleapis.com/css?family=Crete+Round|Source+Sans+Pro|Ubuntu|Exo+2:400,700|Ubuntu+Condensed|Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/jquery.smartmenus.bootstrap.css" />
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/estilo2.css" />
</head>
<body>
	<div  id="contenedor">
		<div id="cabecera">
			<div id="arriba" data-spy="affix" data-offset-top="197">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<img src="img/logo 3.png" alt="logo" id="logo">
						</div>
						<div class="col-md-4 col-lg-4 hidden-xs hidden-sm">
							<form action="">
								<div class="input-group ">
									<input type="text" class="form-control buscador">
									<span class="input-group-btn">
										<button class="btn btn-default buscar-header buscador" type="button"><span class="glyphicon glyphicon-search"></span></button>
									</span>
								</div>
							</form>
						</div>
						<div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
							<ul class="nav nav-pills">
					      		<li id="carrito"><i class="fa fa-shopping-cart fa-2x"><p>0</p></i>
									<div id="ver-carrito">
										<div class="table-responsive">
											<table class="table table-hover">
												<thead>
													<tr>
														<th> </th>
														<th class="text-center">Producto</th>
														<th class="text-center">Cantidad</th>
														<th class="text-center">Precio</th>
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
															<div class="nombre-prod">
																<p>NOTEBOOK LENOVO G40 45 E1-6010 2GB/1000 GB</p>
															</div>
														</td>
														<td >
															<div class="cantidad-prod">
																<p>2</p>
															</div>
														</td>
														<td>
															<div class="precio-prod">
																<p>$22213.6</p>
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
					      		</li>
					    	</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="menu" class="navbar navbar-default">
				<div class="container">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<div class="collapse navbar-collapse" id="myNavbar">
						<ul class="nav navbar-nav home">
							<li class="active"><a href="?page=home">HOME</a></li>
							<li ><a href="?page=quienesSomos">QUINES SOMOS</a></li>
							<li ><a href="?page=alquilar">ALQUILER</a></li>
							<li >
								<a  href="#">
									PRODUCTOS <span class="caret"></span>
								</a>
								<ul class="dropdown-menu ">
									<?php 
										require_once("itemsMenu.php");
									 ?>
								</ul>
							</li>
							<li ><a href="?page=contacto">CONTACTO</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
       						 <li><a href="?page=registracion"><span class="glyphicon glyphicon-user"></span> Registrarse </a></li>
       						 <li><a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> Iniciar Sesion</a></li>
     					 </ul>
					</div>
				</div>
			</div>						
		</div>	
