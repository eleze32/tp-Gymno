
<div class="contenido">
	<div class="container">
		<div class="row">
			<div id="contenido-Principal" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="titulo">
					<h2 class="text-center">Finalizando Pedido</h2>
				</div>
				<form action="" id="formularioFinCompra" method="post">
					<div class="row">
						<div class="col-xs-12">
							<h3> Forma de Entrega</h3>
							<hr>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<p> <b> Opciones disponibles </b></p>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
								<input type="radio" name="entrega" value="domicilio" checked/>Envio a Domicilio 
								<p class="rojo">Consto de envio $99</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6"> 
								<input type="radio" name="entrega" value="sucursal" />Retiro en Sucursal
								<p class="verde">Gratis</p>
							</div>
						</div>	
					</div>
					<div id="EnvDomicilio">
						<div class="row">
							<div class="col-xs-12">
								<p> <b> Domicilio de Entrega </b></p>
								<hr>
							</div>
							<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
								<label for="calle">Calle*</label>
								<input type="text" id="calle" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<label for="altura">Altura*</label>
								<input type="text" id="altura" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
								<label for="piso">Piso</label>
								<input type="text" id="piso" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
								<label for="dpto">Dpto</label>
								<input type="text" id="dpto" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<label for="localidad"> Ingresa localidad*</label>
								<input type="text" id="localidad" class="form-control"/>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
								<label for="ecalle1">Entre Calle 1</label>
								<input type="text" id="eCalle1" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<label for="eCalle2">Entre Calle 2</label>
								<input type="text" id="eCalle2" class="form-control"/>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<label for="cPostal">Codigo Postal*</label>
								<input type="text" id="cPostal" class="form-control"/>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<h3> Forma de Pago</h3>
							<hr>
							<label for="fPago">¿Como lo queres pagar?</label>
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-4"> 
							<input type="radio" name="tPago" value="targeta" checked />Targeta de Credito 
						</div>
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-4"> 
							<input type="radio" name="tPago" value="efectivo" />Efectivo(ContraEmbolso)
						</div>
					</div>
					<div id="formaPago">
						<div class="row">
							<div class="col-xs-12 col-sm-5 col-md-5 col-lg-5">
								<select name="targeta" id="targeta" class="form-control">
									<option value="">Seleccionar Targeta</option>
									<option value="visa">Visa</option>
									<option value="mastercard">Mastercard</option>
									<option value="tNaranja">Targeta Naranja</option>
									<option value="tShopping">Targeta Shopping</option>
									<option value="cenconsud">Censcosud</option>
								</select>
							</div>
							<div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
								<select name="cuota" id="cuota" class="form-control">
									<option value="">Cuotas</option>
									<option value="1">1</option>
									<option value="3">3</option>
									<option value="6">6</option>
									<option value="12">12 </option>
								</select>
							</div>
							<div class="col-xs-12">
								<h3>Datos de la targeta </h3>
								<hr>
								<p>IMPORTANTE: Solo podr&aacute; retirar el producto el titular del medio de pago, presentando su DNI y la targeta utilizada para abonar la compra.</p>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<label for="nomTitTargeta"> Nombre tal cual aprece en targeta*</label>
								<input type="text" id="nomTitTargeta" class="form-control"/>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
								<label for="numTargeta"> Numero de Targeta*</label>
								<input type="text" id="numTargeta" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<label for="codTargeta"> Codigo de Seguridad*</label>
								<input type="text" id="codTargeta" class="form-control"/>
							</div>
							<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
								<label for="fVenTargeta"> Fecha Vencimiento*</label>
								<input type="text" id="fVenTargeta" class="form-control"/>
							</div>
						</div>

					</div>
					<input type="submit" class="btn btn-default" value="Terminar Compra"/>
				</form>		
			</div> 
		</div>
	</div> 
</div> 		 
