
	<div class="d-flex justify-content-around bg-light mb-3" id="menuTop">
	   <div class="p-1">
	   		<div class="d-flex justify-content-start">
	   		    <div class="p-2">
	   		    	<button class="btn btn-success btn-md">Personas</button>
	   		    </div>
	   		    <div class="p-2">
	   		    	<button class="btn btn-basic btn-md">Empresas</button>
	   		    </div>
	   		    <div class="p-2">
	   		    	<button class="btn btn-basic btn-md">Nuevos Contribuyentes</button>
	   		    </div>
	   		    <div class="p-2">
	   		    	<button class="btn btn-basic btn-md">Residentes en el extranjero</button>
	   		    </div>
	   		</div>
	   </div>
	   <div class="p-1">
	   		<div class="d-flex justify-content-center">
	   			<div class="input-group mb-3 p-1">
	   			    <input type="text" class="form-control" placeholder="Buscar">
	   			    <div class="input-group-append">
	   			      <span class="input-group-text"><i class='fas fa-search'></i></span>
	   			    </div>
	   			  </div>
	   		</div>
	   </div>
	</div>

	<div class="d-flex justify-content-around bg-white" id="submenuTop">
	   <div class="p-1">
	   		<div class="d-flex justify-content-start text-secondary">
	   		    <div>
	   		    	<p >Asalariados |&nbsp;</p>
	   		    </div>
	   		    <div>
	   		    	<p >Arrendadores |&nbsp; </p>
	   		    </div>
	   		    <div>
	   		    	<p >Empresarios y profesionistas |&nbsp; </p>
	   		    </div>
	   		    <div>
	   		    	<p >Incorporación Fiscal |&nbsp; </p>
	   		    </div>
	   		    <div>
	   		    	<p >Sector Primario |&nbsp; </p>
	   		    </div>
	   		    <div>
	   		    	<p >Otros Ingresos</p>
	   		    </div>
	   		</div>
	   </div>
	   <div class="p-1">
	   		
	   </div>
	</div>

	<div class="d-flex justify-content-center bg-light" id="menuOptions">
		<div class="p-2">
			<div class="dropdown">
			  <button type="button" class="btn btn-outline-secondary btn-md dropdown-toggle" data-toggle="dropdown">
			    Declaraciones
			  </button>
			  <div class="dropdown-menu ">
			    <a class="dropdown-item" href="#" title="Presenta tu declaración de pagos mensuales y definitivos. Régimen simplificado de confianza" data-toggle="collapse" data-target="#login">Presenta tu declaración de pagos mensuales y definitivos...</a>
			    <a class="dropdown-item text-secondary" href="#" title=" Presenta tu declaración de entero de retenciones de IVA del ejercicio 2022 en adelante">
			    Presenta tu declaración de entero de retenciones de... </a>
			    <a class="dropdown-item text-secondary" href="#" title=" Presenta tu declaración de entero de retenciones por salarios y asimilados a salarios del ejercicio 2022 en adelante"> 
			    Presenta tu declaración de entero de retenciones por...</a>
			    <a class="dropdown-item text-secondary" href="#" title="Presenta tus pagos provisionales o definitivos de personas físicas Visor de facturas emitidas y recibidas para el pago mensual, provisional y definitivo del régimen simplificado">
			    Presenta tus pagos provisionales o definitivos de ...</a>
			    <a class="dropdown-item text-secondary" href="#" title="Visor de facturas emitidas y recibidas para el pago mensual, provisional y definitivo del régimen simplificado...">
			    Visor de facturas emitidas y recibidas para el ...</a>
			    <a class="dropdown-item text-secondary" href="#">
			    Ver más ...</a>
			  </div>
			</div>
			 

		</div>
		<div class="p-2">
			<button class="btn btn-basic btn-md text-secondary">Factura Electrónica</button>
		</div>
		<div class="p-2">
			<button class="btn btn-basic btn-md text-secondary">Trámites del RFC</button>
		</div>
		<div class="p-2">
			<button class="btn btn-basic btn-md text-secondary">Adeudos Fiscales</button>
		</div>
		<div class="p-2">
			<button class="btn btn-basic btn-md text-secondary">Devoluciones y compensaciones</button>
		</div>
		<div class="p-2">
			<button class="btn btn-basic btn-md text-secondary">Otros trámites y servicios</button>
		</div>
		<div class="p-2">
			<button class="btn btn-basic btn-md text-secondary">Comercio Exterior</button>
		</div>
	</div>
	<div id="login" class="collapse container">
		<div class="d-flex  bg-light flex-column" id="acceso" style="margin-top: 5%">
			<div class="d-flex justify-content-center bg-light">
				<h2>Acceso por contraseña</h2>
			</div>
			<hr>
			<div class="d-flex justify-content-center bg-light">
				<form action="<?php echo site_url('declaracion'); ?>" method="POST">
				  <div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text">RFC:</span>
				    </div>
				    <input type="text" class="form-control" name="userRFC">
				  </div>
				  <div class="input-group mb-3">
				    <div class="input-group-prepend">
				      <span class="input-group-text">Contraseña:</span>
				    </div>
				    <input type="password" class="form-control" name="userPass" >
				  </div>
				  <div class="d-flex justify-content-end bg-light">
				  	<button type="submit" class="btn btn-outline-success btn-md">Enviar</button>
				  </div>
				</form>
			</div>
		</div>
	</div>
	


