<div id="imagen-cabecera">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">
				<div class="text-center">
					<h1 >Alquiler de Productos</h1>
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
					<h2 class="text-center">Alquilenos</h2>
				</div>
				        <div class="row">
				         	<div class="col-xs-12">
				         		
				         		<br>
				         		<p>Bienvenidos al centro de "alquiler de productos" de GYMNOS. Usted podra alquilar los siguientes combos disponibles o tambien podra alquilar porductos por separado.</p>
				         		
				         		<p>Para realizar un aquiler, debera seleccionar la opcion de "alquiler" en el combo o producto deseado y luego debera completar el formulario de alquiler en el siguiente paso.</p>
				         		<h4><strong>Combos disponibles:</strong></h4>

				         		
				         	</div>
				        </div>
                        
                        
                        <div class="panel-group" id="accordion">
                          <?php 
                            include("productosCombos.php");
                         ?>
                        </div>
 
                         <div class="row">
				        	<div class="col-xs-12">
				        		<h3>Alquilar productos por separado</h3>
				        	</div>
				        </div>


                       <!--Productos de alquiler por separado-->
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