 <?php 
$fechaActual = date('Y-m-d');
$nuevaFecha = date('d-m-Y', strtotime($fechaActual . ' -1 day'));
/*if (!$totIngresos) {
?>
<script type="text/javascript">
	const totIngresos = prompt("Total de ingresos:");
</script>
<?php 	
}else{ ?>
	<script type="text/javascript">
		const totIngresos = <?php  echo $totIngresos[0]['txtTotIngresos']; ?>;
	</script>
<?php 
}
 */?>
 <style type="text/css">
 	.text-span{
 		background-color: #951752;
 		color: white;
 		border: 2px solid red;
 		font-size: 10px;
 		width: 35px !important;
 		height: 35px !important;
 		font-weight: bold;
 	}
 	input.no-spin::-webkit-inner-spin-button,
 	input.no-spin::-webkit-outer-spin-button {
 	  -webkit-appearance: none;
 	  margin: 0;
 	}

 	.text-bold{
 		font-weight: bold;
 	}
 	.text-medium{
 		font-size: 11px;
 	}

 	.text-small{
 		font-size: 9px;
 	}
 	.text-title{
 		color: white;
 	}
 </style>

<div class="container">
	<div class="row">
		<h3><strong>IVA Simplificado de confianza</strong></h3>
		<hr>
	</div>
	<div class="row p-3">
		<div class="col-lg-2">
			<button type="button" class="btn btn-outline-dark w-100 h-100" onclick="modInstucciones();">INSTRUCCIONES</button>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<button type="button" class="bg-red btn text-white w-100 h-100">ADMINISTRACIÓN DE LA DECLARACIÓN</button>
		</div>
		<div class="col-lg-2">
			<button type="button" class="bg-red btn text-white w-100 h-100" onclick="sendData();">GUARDAR</button>
		</div>
	</div>
	<div class="row bg-light rounded text-body p-3">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active text-body" data-bs-toggle="tab" href="#deterIVA2" onclick="deterIVA();">Determinación </a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-body" data-bs-toggle="tab" href="#pagoIVA2" onclick="pagoIVA();">Pago</a>
			  </li>
			</ul>

			<!-- Tab panes -->
		<form action = "<?php echo site_url('iva2'); ?>" method = "POST" id = "frmIVA2">
			<div class="tab-content bg-white">
			  <div class="tab-pane container active" id="deterIVA2">
				  	<div class="row">
				  		<div class="col-lg-6 p-2">
				  			<p class="msg-muted">Los campos marcados con asterisco (*) son obligatorios</p>
				  		</div>
				  	</div>
				  	
				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Actividades gravadas del 16%</p>
				  		</div>
				  		<div class="col-lg-1"></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtActGravadas16" id="txtActGravadas16" class="form-control text-end no-spin"  onkeyup="calculoIva(this.value);" onblur="calculoIva(this.value);" onkeypress="calculoIva(this.value);" onchange="calculoIva(this.value);" value="0">
				  		</div>
				  		<div class="col-lg-3">
				  			<button type="button" class="btn btn-outline-secondary btn-sm" onclick="modGrav16();" id="btnActGravadas16">VER DETALLE</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Actividades gravadas del 0%</p>
				  		</div>
				  		<div class="col-lg-1"></div>
				  		<div class="col-lg-3">
				  			<input type="number" name="txtActGravadas_1" id="txtActGravadas_1" class="form-control text-end  no-spin" onkeyup="iva0(this.value);" onblur="iva0(this.value);" onkeypress="iva0(this.value);" onchange="iva0(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button  class="btn btn-outline-secondary btn-sm" type="button" onclick="msgCaptura();">CAPTURAR</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Actividades exentas</p>
				  		</div>
				  		<div class="col-lg-1"></div>
				  		<div class="col-lg-3">
				  			<input type="number" name="txtActExentas" id="txtActExentas" class="form-control text-end  no-spin"  onkeyup="exentas(this.value);" onblur="exentas(this.value);" onkeypress="exentas(this.value);" onchange="exentas(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button type="button" class="btn btn-outline-secondary btn-sm" disabled>VER DETALLE</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Actividades no objeto del impuesto</p>
				  		</div>
				  		<div class="col-lg-1"></div>
				  		<div class="col-lg-3">
				  			<input type="number" name="txtNoObjeto" id="txtNoObjeto" class="form-control text-end  no-spin"  onkeyup="noObj(this.value);" onblur="noObj(this.value);" onkeypress="noObj(this.value);" onchange="noObj(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button type="button" class="btn btn-outline-secondary btn-sm" disabled>VER DETALLE</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">IVA a cargo a la tasa del 16%</p>
				  		</div>
				  		<div class="col-lg-1"></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtIVA16" id="txtIVA16" class="form-control text-end  no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">
				  			
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<strong class="questions">Total de IVA a cargo</strong>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(=)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtIVACargo" id="txtIVACargo" class="form-control text-end  no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">
				  			
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">IVA no cobrado por devoluciones, descuentos y bonificaciones de ventas</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(-)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtIVANoCobrado" id="txtIVANoCobrado" class="form-control text-end no-spin"  onkeyup="impCargo1(this.value);" onblur="impCargo1(this.value);" onkeypress="impCargo1(this.value);" onchange="impCargo1(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button type="button" class="btn btn-outline-secondary btn-sm" disabled>VER DETALLE</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">IVA retenido</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(-)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtIVARetenido" id="txtIVARetenido" class="form-control text-end no-spin"  onkeyup="ivaRet(this.value);" onblur="ivaRet(this.value);" onkeypress="ivaRet(this.value);" onchange="ivaRet(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button type="button" class="btn btn-outline-secondary btn-sm" disabled>VER DETALLE</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">*IVA acreditable del periodo</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(-)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtIVAPeriodo" id="txtIVAPeriodo" class="form-control text-end no-spin" required onkeyup="ivaAC(this.value);" onblur="ivaAC(this.value);" onkeypress="ivaAC(this.value);" onchange="ivaAC(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button class="btn btn-outline-secondary btn-sm" type="button" onclick="ivaAcred();" >CAPTURAR</button>
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">IVA por devoluciones, descuentos y bonificaciones en gastos</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(+)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"    name="txtIVAPeriodoDesc" id="txtIVAPeriodoDesc" class="form-control text-end no-spin" onkeyup="ivaDev(this.value);" onblur="ivaDev(this.value);" onkeypress="ivaDev(this.value);" onchange="ivaDev(this.value);">
				  		</div>
				  		<div class="col-lg-3">
				  			<button type="button" class="btn btn-outline-secondary btn-sm" disabled>VER DETALLE</button>
				  		</div>
				  	</div>

				  	

				  	<div id="cantMayor">
				  		<div class="row p-2">
				  			<div class="col-lg-4 ">
				  				<strong class="questions">Cantidad a cargo</strong>
				  			</div>
				  			<div class="col-lg-1 text-end"><strong>(=)</strong></div>
				  			<div class="col-lg-3">
				  				<input type="number"    name="txtCantidadCargo" id="txtCantidadCargo" class="form-control text-end no-spin" disabled>
				  			</div>
				  			<div class="col-lg-3">
				  				
				  			</div>
				  		</div>
				  		<div class="row p-2">
				  			<div class="col-lg-4 ">
				  				<p class="questions">Acreditamiento del saldo a favor de periodos anteriores</p>
				  			</div>
				  			<div class="col-lg-1 text-end"><strong>(-)</strong></div>
				  			<div class="col-lg-3">
				  				<input type="number"   name="txtAcreditamiento" id="txtAcreditamiento" class="form-control text-end no-spin" onkeyup="impFavor(this.value);" onblur="impFavor(this.value);" onkeypress="impFavor(this.value);" onchange="impFavor(this.value);" value = '0'>
				  			</div>
				  			<div class="col-lg-3">
				  				
				  			</div>
				  		</div>

				  		<div class="row p-2">
				  			<div class="col-lg-4 ">
				  				<strong class="questions">Impuesto a cargo</strong>
				  			</div>
				  			<div class="col-lg-1 text-end"><strong>(=)</strong></div>
				  			<div class="col-lg-3">
				  				<input type="number"   name="txtCantidadCargoT" id="txtCantidadCargoT" class="form-control text-end no-spin" disabled>
				  			</div>
				  			<div class="col-lg-3">
				  				
				  			</div>
				  		</div>
				  	</div>
				  	
					<div id="cantMenor">
						<div class="row p-2">
							<div class="col-lg-4 ">
								<strong class="questions">Cantidad a cargo</strong>
							</div>
							<div class="col-lg-1 text-end"><strong>(=)</strong></div>
							<div class="col-lg-3">
								<input type="number"    name="txtCantidadCargo_F" id="txtCantidadCargo_F" class="form-control text-end no-spin" disabled>
							</div>
							<div class="col-lg-3">
								
							</div>
						</div>
						<div class="row p-2">
							<div class="col-lg-4 ">
								<strong class="questions">Impuesto a favor</strong>
							</div>
							<div class="col-lg-1 text-end"><strong>(=)</strong></div>
							<div class="col-lg-3">
								<input type="number"   name="txtCantidadCargoF" id="txtCantidadCargoF" class="form-control text-end no-spin" disabled>
							</div>
							<div class="col-lg-3">
								
							</div>
						</div>
					</div>
				  	
			  </div>

			  <div class="tab-pane container fade" id="pagoIVA2">
				  	<div class="row">
				  		<div class="col-lg-6 p-2">
				  			<p class="msg-muted">Los campos marcados con asterisco (*) son obligatorios</p>
				  		</div>
				  	</div>


				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<strong class="questions">A cargo</strong>
				  		</div>
				  		<div class="col-lg-1 text-end"></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtAcargo2" id="txtAcargo2" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<strong class="questions">Total de contribuciones</strong>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(=)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtTotCont2" id="txtTotCont2" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">*¿Tienes compensasiones por aplicar?</p>
				  		</div>
				  		<div class="col-lg-1 text-end"></div>
				  		<div class="col-lg-3">
				  			
				  			<select name="txtComAplicar" id="txtComAplicar" class="form-select" onchange="actCompensaciones(this.value);">
				  				<option value="No">No</option>
				  				<option value="Si" >Si</option>
				  			</select>
				  		</div>
				  		<div class="col-lg-3">	
				  			<button class="btn btn-outline-secondary btn-sm" type="button" onclick="msgCaptura();">CAPTURAR</button>
				  		</div>
				  	</div>
				  	<div id="divCompensaciones">
				  	<div class="row" >
				  		<div class="col-lg-4 ">
				  			<p class="questions">*Compensaciones</p>
				  		</div>
				  		<div class="col-lg-1 text-end">(+)</div>
				  		<div class="col-lg-3">
				  			<input type="text"  id="txtcompensaciones" name="txtcompensaciones" class="form-control text-end" onkeyup="sumarCompen(this.value);" onblur="sumarCompen(this.value);" onkeypress="sumarCompen(this.value);" onchange="sumarCompen(this.value);" value ="0">
				  			
				  		</div>
				  	</div>
				  	</div>

				  	<div class="row p-2" >
				  		<div class="col-lg-4 ">
				  			<p class="questions">*¿Tienes estímulos por aplicar?</p>
				  		</div>
				  		<div class="col-lg-1 text-end"></div>
				  		<div class="col-lg-3">
				  			<select name="txtEstimulos2" id="txtEstimulos2" class="form-select" onchange="actEstimulos(this.value);">
			  					<option value="No">No</option>
			  					<option value="Si">Si</option>
			  				</select>
				  		</div>
				  		<div class="col-lg-3">
				  			<button class="btn btn-outline-secondary btn-sm" type="button" onclick="msgCaptura();">CAPTURAR</button>
				  		</div>
				  	</div>
				  	<div  id="divEstimulos">
				  		<div class="row">
				  			<div class="col-lg-4 ">
				  				<p class="questions">*Estímulos por aplicar</p>
				  			</div>
				  			<div class="col-lg-1 text-end">(+)</div>
				  			<div class="col-lg-3">
				  				
				  				<input type="text"  id="txtestimulos" name="txtestimulos" class="form-control text-end" onkeyup="sumarEstimulos(this.value);" onblur="sumarEstimulos(this.value);" onkeypress="sumarEstimulos(this.value);" onchange="sumarEstimulos(this.value);" value ="0">

				  			</div>
				  		</div>
				  	</div>
				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions text-bold">Total de aplicaciones</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(=)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtTotAplic2" id="txtTotAplic2" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>

				  	<hr>
				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Total de contribuciones</p>
				  		</div>
				  		<div class="col-lg-1 text-end"></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtTotContrib2" id="txtTotContrib2" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Total de aplicaciones</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(-)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtTotAplic2_1" id="txtTotAplic2_1" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<p class="questions">Cantidad a cargo</p>
				  		</div>
				  		<div class="col-lg-1 text-end"><strong>(=)</strong></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtCntAcargo" id="txtCntAcargo" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>

				  	<div class="row p-2">
				  		<div class="col-lg-4 ">
				  			<strong class="questions">Cantidad a pagar</strong>
				  		</div>
				  		<div class="col-lg-1 text-end"></div>
				  		<div class="col-lg-3">
				  			<input type="number"   name="txtAPagar2" id="txtAPagar2" class="form-control text-end no-spin" disabled>
				  		</div>
				  		<div class="col-lg-3">	
				  		</div>
				  	</div>
			  </div>

			</div>
		</form>
		</div>
		<div class="col-lg-1 "></div>
	</div>
</div>


<!-- MODAL -->

<div class="modal fade" id="message1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-blood text-white">
        <h4 class="modal-title ">Instrucciones</h4>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
        	<div class="col-lg-1"></div>
        	<div class="col-lg-10">
        		<p class="p-2">
        			En esta sección para calcular el impuesto al valor agregado, se deberá considerar lo siguiente:
        		</p>
        		<ol>
        			<li>Con la información de las facturas emitidas en el mes que deseas declarar, se prellenó el importe de los siguientes campos:
        				<ul>
        					<li>Actividades gravadas a la tasa del 16%.</li>
        					<li>Actvidades sujetas al estímulo de la región fronteriza.</li>
        					<li>Actividadea gravadas a la tasa del 0%.</li>
        					<li>Actividades excentas.</li>
        					<li>Actividades no objeto del impuesto.</li>
        					<li>IVA a cargo a la tasa del 16%.</li>
        					<li>IVA a cargo sujeto al estímulo de la región fronteriza.</li>
        					<li>IVA no cobrado por devoluciones, descuentos y bonificaciones de ventas.</li>
        					<li>IVA retenido.</li>
        					<li>IVA por devoluciones, descuentos y bonificaciones en gastos.</li>
        				</ul>
        				<dd class="pt-2">Podrás consultar el detalle de información que se prellenó dando clic en el hipervínculo o en el botón  disabled"Ver Detalle" de cada uno de los campos anteriores.</dd>
        			</li>
        			<li>En caso de que hayas efectuado actividades gravadas a tasa del 0% deberás detallar el importe capturado o prellenado en dicho campo dando clic en el botón  "Capturar".</li>
        			<li>Podrás modificar los importes en los campos habilitados y que cuenten con un prellenado, lo cual actualizará el cálculo correspondiente del IVA a cargo.</li>
        			<li>Si tu cantidad a cargo es mayuor a cero, podrás acreditar el saldo pendiente de periodos anteriores.</li>
        			<li>Una ves que hayas finalizado de capturar tu información se habilitará la siguiente sección.</li>
        		</ol>
        	</div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary " data-bs-dismiss="modal">CERRAR</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal gravadas 16%  -->

<div class="modal fade" id="modGrav16">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-blood text-white">
        <h4 class="modal-title">Actividades gravadas a la tasa del 16%</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
        <p class="text-medium"> 
        	A continuación se muestra el detalle de prellenado de IVA de las actividades gravadas a la tasa del 16%, este detalle lo puedes consultar en el visor de facturas emitidas y recibidas.
        </p>
        <br>
        <p class="text-bold text-medium">
        	Suma de facturas emitidas de tipo ingreso del mes con método de pago "Pago en una sola exhibición" (PUE).
        </p>

        <div class="table-responsive container">
        	<table class="table table-bordered">
        		<thead class="text-medium text-bold text-center">
        			<tr>
        				<th>Mes</th>
        				<th>Número de facturas Canceladas</th>
        				<th>Número de facturas Vigentes</th>
        				<th>Subtotal</th>
        				<th>Descuento</th>
        				<th>Subtotal - Descuento</th>
        				<th>Impuestos trasladados Base IVA 16%</th>
        				<th>Impuestos trasladados IVA 16%</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr class="table-active">
        				<td class="text-medium text-center" id="txtMes"></td>
        				<td class="text-end text-medium">0</td>
        				<td class="text-end text-medium">0</td>
        				<td class="text-end text-medium" id="SubTot"></td>
        				<td class="text-end text-medium">0</td>
        				<td class="text-end text-medium" id="SubTot1"></td>
        				<td class="text-end text-medium" id="SubTot2"></td>
        				<td class="text-end text-medium" id="ivaTot"></td>
        			</tr>
        		</tbody>
        	</table>
        </div>

        <br>
        <p class="text-bold text-medium">
        	Suma de facturas emitidas de tipo pago correspondiente al mes.
        </p>
        <br>

        <div class="table-responsive container">
        	<table class="table table-bordered">
        		<thead>
        			<tr class="text-center text-medium text-bold">
        				<th>Mes</th>
        				<th>Número de facturas Canceladas</th>
        				<th>Número de facturas Vigentes</th>
        				<th>Ingresos cobrados sin impuestos</th>
        				<th>Impuestos trasladados Base IVA 16%</th>
        				<th>Impuestos trasladados IVA 16%</th>
        			</tr>
        		</thead>
        		<tbody>
        			<tr class="table-active">
        				<td class="text-medium text-center" id="txtMes1"></td>
        				<td class="text-end text-medium">0</td>
        				<td class="text-end text-medium">0</td>
        				<td class="text-end text-medium"></td>
        				<td class="text-end text-medium"></td>
        				<td class="text-end text-medium"></td>
        			</tr>
        		</tbody>
        	</table>
        </div>

        <div class="row">
        	<div class="col-lg-4">
        		<p class="text-medium">
        			Base IVA 16% de facturas emitidas de tipo ingreso
        		</p>
        	</div>
        	<div class="col-lg-1">
        		
        	</div>
        	<div class="col-lg-3">
        		<input type="text" name="txtBG16" class="form-control text-end text-medium" disabled  id="txtFEP">
        	</div>
        </div>

        <div class="row">
        	<div class="col-lg-4">
        		<p class="text-medium">
        			Base IVA 16% de facturas emitidas de tipo pago
        		</p>
        	</div>
        	<div class="col-lg-1">
        		<div class="align-items-end">
        			<p>(+)</p>
        		</div>
        	</div>
        	<div class="col-lg-3">
        		<input type="text" name="txtBG16" class="form-control text-end text-medium" disabled value="0">
        	</div>
        </div>

        <div class="row">
        	<div class="col-lg-4">
        		<p class="text-medium text-bold">
        			Actividades gravadas a la tasa del 16%
        		</p>
        	</div>
        	<div class="col-lg-1">
        		<div class="content-align-end">
        			<p>(=)</p>
        		</div>
        	</div>
        	<div class="col-lg-3">
        		<input type="text" name="txtBG16" class="form-control text-end text-medium text-bold"  disabled  id="txtAG16">
        	</div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary btn-md" data-bs-dismiss="modal">CERRAR</button>
      </div>

    </div>
  </div>
</div>

<!-- Modal gravadas IVA acreditabe del periodo  -->


<div class="modal" id="modal1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-blood text-white">
    			  		<h4 class="modal-title">IVA acreditable del periodo</h4>
    			  		<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        	</div>
       

        <!-- Modal body -->
        <div class="modal-body container">
    				<div class="row">
    					<div class="col-lg-12 text-end " style="margin-right: 5%;">
    						<button type="button" class="btn btn-outline-dark btn-lg text-medium" onclick="mdInst1();">INSTRUCCIONES</button>
    					</div>
    				</div>

          <div class="row p-1">
          	<div class="col-lg-5">
          		<p class="text-medium">
          			IVA pagado en gastos y adquisisiones
          		</p>
          	</div>
          	<div class="col-lg-1 " style="text-align: right;">
          		<p>&nbsp;&nbsp;&nbsp;</p>
          	</div>
          	<div class="col-lg-3">
          		<input type="text" class="form-control" name="txtivaG_A" id="txtivaG_A" disabled>
          	</div>
          </div>

          <div class="row p-1">
          	<div class="col-lg-5">
          		<p class="text-medium">
          			*IVA acreditable por actividades gravadas a tasa 16% u 8% y tasa 0%
          		</p>
          	</div>
          	<div class="col-lg-1 " style="text-align: right;">
          		<p>&nbsp;&nbsp;&nbsp;</p>
          	</div>
          	<div class="col-lg-3">
          		<input type="text" class="form-control" name="txtivaA_G16_8_0" id="txtivaA_G16_8_0" disabled>
          	</div>
          </div>
 
          <div class="row p-1">
          	<div class="col-lg-5">
          		<p class="text-medium">
          			*IVA acreditable por actividades mixtas
          		</p>
          	</div>
          	<div class="col-lg-1 " style="text-align: right;">
          		<p class="text-medium">(+)</p>
          	</div>
          	<div class="col-lg-3">
          		<input type="text" class="form-control" name="txtivaA_M" id="txtivaA_M" disabled>
          	</div>
          </div>

          <div class="row p-1">
          	<div class="col-lg-5">
          		<p class="text-medium text-bold">
          			IVA acreditable del periodo
          		</p>
          	</div>
          	<div class="col-lg-1 " style="text-align: right;">
          		<p class="text-medium">(=)</p>
          	</div>
          	<div class="col-lg-3">
          		<input type="text" class="form-control" name="txtivaA_P" id="txtivaA_P" disabled>
          	</div>
          </div>

          <div class="row p-1">
          	<div class="col-lg-5">
          		<p class="text-medium">
          			IVA no acreditable
          		</p>
          	</div>
          	<div class="col-lg-1 " style="text-align: right;">
          		<p class="text-medium">&nbsp;&nbsp;&nbsp;</p>
          	</div>
          	<div class="col-lg-3">
          		<input type="text" class="form-control" name="txtivaN_A" id="txtivaN_A" disabled>
          	</div>
          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-secondary btn-md" data-bs-dismiss="modal">CERRAR</button>
        </div>

      </div>
    </div>
</div>

<!-- Modal INSTRUCICONES IVA acreditable del periodo -->
<div class="modal fade" id="instMd1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-blood text-white">
        <h4 class="modal-title ">Instrucciones</h4>
        <button type="button" class="btn-close text-white" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
        	<div class="col-lg-1"></div>
        	<div class="col-lg-10">
        		<p class="p-2 text-medium">
        			En este apartado se calculará el VIA areditable del periodo de acuerdo a lo siguiente:
        		</p>
        		<ol class="text-medium">
        				<li>
        					Con la información de las facturas recibidas en el mes de tipo ingreso y pago se prelleno el importe del campo IVA pagado en gastos y adquisiciones y que servirá de referencia para la captura de información relacionada al IVA acreditable del periodo.
        				</li>
        			<li>Para calcular el IVA acreditable del periodo, se captura la información correspondiente a los siguientes campos:
        				<ul>
        					<li>IVA acreditable por actividades gravadas y tasa 0%</li>
        					<li>IVA acreditable por actividades mixtas</li>
        				</ul>
        			</li>
        			<li>Captura el IVA no acreditable correspondiente al mes a declarar.</li>
        			<li>Da clic en el botón CERRAR para regresar a la pantalla anterior.</li>
        		</ol>
        	</div>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary " data-bs-dismiss="modal">CERRAR</button>
      </div>

    </div>
  </div>
</div>



<script type="text/javascript">
	//document.getElementById('txtActGravadas16').value = totIngresos;

	let actGravadas =  document.getElementById('txtActGravadas16');
	let actGravadas_1= document.getElementById('txtActGravadas_1');
	let actExentas= document.getElementById('txtActExentas');
	let noObjeto= document.getElementById('txtNoObjeto');
	let iVANoCobrado = document.getElementById('txtIVANoCobrado');
	let iVARetenido = document.getElementById('txtIVARetenido');
	let iVAPeriodo = document.getElementById('txtIVAPeriodo');
	let iVAPeriodoDesc = document.getElementById('txtIVAPeriodoDesc');
	let acreditamiento = document.getElementById('txtAcreditamiento');
	let cantidadCargoF = document.getElementById('txtCantidadCargoF');
	let cantidadCargoT = document.getElementById('txtCantidadCargoT');
	let cantidadCargo = document.getElementById('txtCantidadCargo');
	let cantidadCargo_F = document.getElementById('txtCantidadCargo_F');
	let iVA16 = document.getElementById('txtIVA16');
	let iVACargo = document.getElementById('txtIVACargo');

	let btnActGravadas16 = document.getElementById('btnActGravadas16');
	function sendData(){
		let obj = {};
		obj.eIdDeclaracion = <?php echo $_GET['eIdDeclaracion']; ?>;
		if(iVAPeriodo.value != '' && actGravadas.value != 0 ){
			obj.actGravadas = actGravadas.value;
			obj.actGravadas_1 = actGravadas_1.value;
			obj.actExentas = actExentas.value;
			obj.noObjeto = noObjeto.value;
			obj.iVANoCobrado = iVANoCobrado.value;
			obj.iVARetenido = iVARetenido.value;
			obj.iVAPeriodo = iVAPeriodo.value;
			obj.iVAPeriodoDesc = iVAPeriodoDesc.value;
			obj.acreditamiento = acreditamiento.value;
			obj.cantidadCargoF = cantidadCargoF.value;
			if(cantidadCargoT.value == ''){
				cantidadCargoT.value = 0;
			}
			if(cantidadCargo.value == ''){
				cantidadCargo.value = 0;
			}

			obj.cantidadCargoT = cantidadCargoT.value;
			obj.cantidadCargo = cantidadCargo.value;
			obj.cantidadCargo_F = cantidadCargo_F.value;
			obj.iVA16 = iVA16.value;
			obj.iVACargo = iVACargo.value;
			obj.txtAcargo2 = document.getElementById('txtAcargo2').value;
			obj.txtTotCont2 = document.getElementById('txtTotCont2').value;
			obj.txtComAplicar = document.getElementById('txtComAplicar').value;
			obj.txtcompensaciones = document.getElementById('txtcompensaciones').value;
			obj.txtEstimulos2 = document.getElementById('txtEstimulos2').value;
			obj.txtestimulos = document.getElementById('txtestimulos').value;
			obj.txtTotAplic2 = document.getElementById('txtTotAplic2').value;
			obj.txtTotContrib2 = document.getElementById('txtTotContrib2').value;
			obj.txtTotAplic2_1 = document.getElementById('txtTotAplic2_1').value;
			obj.txtCntAcargo = document.getElementById('txtCntAcargo').value;
			obj.txtAPagar2 = document.getElementById('txtAPagar2').value;

		  	axios.post("<?php echo site_url('iva2'); ?>" ,obj).then(
				function(res){
		        if (res.status == 200) {
		        	console.log(res.data);
	          }
	    	}).catch(function(err){
	        alert(err);
	        console.log(err);
	    	});
		}else{
			alert("Favor de Completar datos faltantes");
			if(actGravadas.value == 0){
				actGravadas.focus();
			}else if(iVAPeriodo.value == ''){
				iVAPeriodo.focus();
			}

		}

		

	}

	function calculoIva(monto){
		let ivaCargo16 = (monto * 0.16).toFixed(2);
	  	iVA16.value = ivaCargo16;
	  	iVACargo.value = ivaCargo16;
	}

	function modGrav16(){
		var myModal = new bootstrap.Modal(document.getElementById('modGrav16'));
		let txtFEP = document.getElementById('txtFEP');
	  let txtAG16 = document.getElementById('txtAG16');
	  var input = $('#txtActGravadas16').val();
	  let fiva16 = parseFloat(input * 0.16);
	  document.getElementById('ivaTot').innerHTML = fiva16.toFixed(2);
	  document.getElementById('SubTot').innerHTML = input;
	  document.getElementById('SubTot1').innerHTML = input;
	  document.getElementById('SubTot2').innerHTML = input;
	  txtFEP.value = input;
	  txtAG16.value = input;

	  
		let eIdDeclaracion = <?php
		if(isset($_GET['eIdDeclaracion'])){
			echo $_GET['eIdDeclaracion'];
		}
		if(isset($_POST['eIdDeclaracion'])){
			echo $_POST['eIdDeclaracion'];
		}
	  ?>;
	  let idData = {};
	  idData.id = eIdDeclaracion;
	  axios.post("<?php echo site_url('getDeclaracion'); ?>" ,idData).then(
			function(res){
	        if (res.status == 200) {
	        	let data = res.data;
	        	document.getElementById('txtMes').innerHTML = data.txtPeriodo;
	        	document.getElementById('txtMes1').innerHTML = data.txtPeriodo;
          }
	    	}).catch(function(err){
	        alert(err);
	        console.log(err);
			    	});
	  
		// Mostrar el modal
		myModal.show();
	}


	function modInstucciones(){
		var myModal = new bootstrap.Modal(document.getElementById('message1'));

		// Mostrar el modal
		myModal.show();
	}

	// Esperar a que la página se cargue completamente
	document.addEventListener('DOMContentLoaded', function() {
		txtActGravadas_1.value = 0;
		actExentas.value = 0;
		noObjeto.value = 0;
		iVANoCobrado.value = 0;
		iVARetenido.value = 0;
		iVAPeriodoDesc.value = 0;

	  // Obtener el modal por su ID
	  var myModal = new bootstrap.Modal(document.getElementById('message1'));
	  // Mostrar el modal
	  myModal.show();

	  document.getElementById('divCompensaciones').style.display = 'none';
	  document.getElementById('divEstimulos').style.display = 'none';


	});
	function actCompensaciones(op){
		if(op==1){
			document.getElementById('divCompensaciones').style.display = 'block';
		}else{
			document.getElementById('divCompensaciones').style.display = 'none';
			document.getElementById('divCompensaciones').value = 0;
			sumarCompen(0);

		}
	}

	function actEstimulos(op){
		if(op==1){
			document.getElementById('divEstimulos').style.display = 'block';
		}else{
			document.getElementById('divEstimulos').style.display = 'none';
			document.getElementById('divEstimulos').value = 0;
			sumarEstimulos(0);
		}
	}

	function iva0(monto){
		let noimp = document.getElementById('txtNoObjeto').value;
		let exenta = document.getElementById('txtActExentas').value;
		if(noimp == ''){
			noimp = 0;
		}else{
			noimp = parseFloat(noimp);
		}
		if(exenta == ''){
			exenta = 0;
		}else{
			exenta = parseFloat(exenta);
		}
		if(monto == ''){
			monto = 0;
		}
		let tot = (parseFloat(actGravadas.value) + parseFloat(monto) + parseFloat(noimp) + parseFloat(exenta)) * .16;
		console.log(tot);
		iVACargo.value = tot.toFixed(2);
	}

	function exentas(monto){
		let noimp = document.getElementById('txtNoObjeto').value;
		let act0 = document.getElementById('txtActGravadas_1').value;
		if(act0 == ''){
			act0 = 0;
		}else{
			act0 = parseFloat(act0);
		}
		if(monto == ''){
			monto = 0;
		}
		let tot = (parseFloat(actGravadas.value) + parseFloat(monto) + parseFloat(noimp) + parseFloat(act0)) * .16;
		iVACargo.value = tot.toFixed(2);
	}

	function noObj(monto){
			let exenta = document.getElementById('txtActExentas').value;
			let act0 = document.getElementById('txtActGravadas_1').value;
			if(exenta == ''){
				exenta = 0;
			}else{
				exenta = parseFloat(exenta);
			}
			if(act0 == ''){
				act0 = 0;
			}else{
				act0 = parseFloat(act0);
			}
			if(monto == ''){
			monto = 0;
			}
			let tot = (parseFloat(actGravadas.value) + parseFloat(monto) + parseFloat(act0) + parseFloat(exenta)) * .16;
			iVACargo.value = tot.toFixed(2);
	}


	

	let cantMenor = document.getElementById('cantMenor');
	let cantMayor = document.getElementById('cantMayor');

	function impCargo1(monto){
		let iR = iVARetenido.value;
		let iP = iVAPeriodo.value;
		let iD = iVAPeriodoDesc.value;

		if(iR == ''){
			iR = 0;
		}else{
			iR = parseFloat(iR);
		}
		if(iP == ''){
			iP = 0;
		}else{
			iP = parseFloat(iP);
		}
		if(iD == ''){
			iD = 0;
		}else{
			iD = parseFloat(iD);
		}
		if(monto == ''){
		monto = 0;
		}
		let tot = parseFloat(iVACargo.value) - parseFloat(monto) - parseFloat(iR) - parseFloat(iP) + parseFloat(iD);
		impCargo();

		/*if(tot < iVACargo.value){
			cantidadCargo.value = tot.toFixed(2);
			cantidadCargoF.value = 0;
			acreditamiento.disabled = true;

		}else{
			cantidadCargo.value = (tot.toFixed(2)) * -1;
			cantidadCargoF.value = (tot.toFixed(2)) * -1;
			acreditamiento.disabled = false;

		}*/
	}

	function ivaRet(monto){
		let iNC = iVANoCobrado.value;
		let iP = iVAPeriodo.value;
		let iD = iVAPeriodoDesc.value;

		if(iNC == ''){
			iNC = 0;
		}else{
			iNC = parseFloat(iNC);
		}
		if(iP == ''){
			iP = 0;
		}else{
			iP = parseFloat(iP);
		}
		if(iD == ''){
			iD = 0;
		}else{
			iD = parseFloat(iD);
		}
		if(monto == ''){
		monto = 0;
		}
		let tot = parseFloat(iVACargo.value) - parseFloat(monto) - parseFloat(iNC) - parseFloat(iP) + parseFloat(iD);
		impCargo();
		/*if(tot < iVACargo.value){
			cantidadCargo.value = tot.toFixed(2);
			cantidadCargoF.value = 0;
			acreditamiento.disabled = true;
		}else{
			cantidadCargo.value = 0;
			cantidadCargoF.value = (tot.toFixed(2)) * -1;
			acreditamiento.disabled = false;
		}*/
	}

	function ivaAC(monto){
		let iNC = iVANoCobrado.value;
		let iP = iVARetenido.value;
		let iD = iVAPeriodoDesc.value;

		if(iNC == ''){
			iNC = 0;
		}else{
			iNC = parseFloat(iNC);
		}
		if(iP == ''){
			iP = 0;
		}else{
			iP = parseFloat(iP);
		}
		if(iD == ''){
			iD = 0;
		}else{
			iD = parseFloat(iD);
		}
		if(monto == ''){
		monto = 0;
		}
		let tot = parseFloat(iVACargo.value) - parseFloat(monto) - parseFloat(iNC) - parseFloat(iP) + parseFloat(iD);
		impCargo();
		/*if(tot < iVACargo.value){
			cantidadCargo.value = tot.toFixed(2);
			cantidadCargoF.value = 0;
			acreditamiento.disabled = true;
		}else{
			cantidadCargo.value = 0;
			cantidadCargoF.value = (tot.toFixed(2)) * -1;
			acreditamiento.disabled = false;

		}*/
	}

	function ivaDev(monto){
		let iNC = iVANoCobrado.value;
		let iP = iVARetenido.value;
		let iD = iVAPeriodo.value;

		if(iNC == ''){
			iNC = 0;
		}else{
			iNC = parseFloat(iNC);
		}
		if(iP == ''){
			iP = 0;
		}else{
			iP = parseFloat(iP);
		}
		if(iD == ''){
			iD = 0;
		}else{
			iD = parseFloat(iD);
		}
		if(monto == ''){
		monto = 0;
		}
		let tot = parseFloat(iVACargo.value) - parseFloat(iD) - parseFloat(iNC) - parseFloat(iP) + parseFloat(monto);
		impCargo();
		/*if(tot < iVACargo.value){
			console.log(tot);
			cantidadCargo.value = (tot.toFixed(2)) * -1;
			cantidadCargoF.value = 0;
			acreditamiento.disabled = true;
		}else{
			console.log(tot);
			cantidadCargo.value = tot.toFixed(2);
			cantidadCargoF.value = (tot.toFixed(2)) * -1;
			acreditamiento.disabled = false;
		}*/
	}

	function pagoIVA(){
		
		
		if(actGravadas.value == 0 ){
			alert("Favor de completar las Actividades gravadas del 16%");
			document.getElementById('deterIVA2').style.display = 'block';
			document.getElementById('pagoIVA2').style.display = 'none';
			actGravadas.focus();
		}else if(iVAPeriodo.value == ''){
			alert("Favor de completar el IVA acreditable del periodo");
			document.getElementById('deterIVA2').style.display = 'block';
			document.getElementById('pagoIVA2').style.display = 'none';
			iVAPeriodo.focus();
		}else{
			document.getElementById('deterIVA2').style.display = 'none';
			document.getElementById('pagoIVA2').style.display = 'block';
			impCargo();
		}
	}
	function deterIVA(){
			document.getElementById('deterIVA2').style.display = 'block';
			document.getElementById('pagoIVA2').style.display = 'none';
			impCargo();
	}
	function impCargo(){
			let sum = 0;
			sum += parseFloat(iVANoCobrado.value);
			sum += parseFloat(iVARetenido.value);
			sum += parseFloat(iVAPeriodo.value);
			sum -= parseFloat(iVAPeriodoDesc.value);

			if(sum.toFixed(2) > parseFloat(iVACargo.value)){

				if(cantidadCargo.value == ''){
					cantidadCargo.value = 0;
				}

				if(cantidadCargoT.value == ''){
					cantidadCargoT.value = 0;
				}
				cantMenor.style.display = 'none';
				cantMayor.style.display = 'inline';
				let res = sum - parseFloat(iVACargo.value);
				cantidadCargo.value = res.toFixed(2);
				cantidadCargoT.value = res.toFixed(2);
				document.getElementById('txtAcargo2').value = res.toFixed(2);
				document.getElementById('txtAcargo2').value = cantidadCargoT.value;
				document.getElementById('txtTotCont2').value = cantidadCargoT.value;
				document.getElementById('txtTotContrib2').value = cantidadCargoT.value;
				document.getElementById('txtTotAplic2').value = cantidadCargoT.value;
				document.getElementById('txtCntAcargo').value = cantidadCargoT.value;
				document.getElementById('txtAPagar2').value = cantidadCargoT.value;
				document.getElementById('txtTotAplic2_1').value = 0;


			}else{
				if(cantidadCargoF.value == '' || cantidadCargoF.value == 0){
					cantidadCargoF.value = 0;
				}

				if(cantidadCargo_F.value == '' || cantidadCargo_F.value == 0){
					cantidadCargo_F.value = 0;
				}
				cantMenor.style.display = 'inline';
				cantMayor.style.display = 'none';
				let res = parseFloat(iVACargo.value) - sum; 
				cantidadCargo_F.value = res.toFixed(2);
				cantidadCargoF.value = res.toFixed(2);
				document.getElementById('txtAcargo2').value = res.toFixed(2);
				document.getElementById('txtAcargo2').value = parseFloat(cantidadCargoF.value) * -1;
				document.getElementById('txtTotCont2').value = parseFloat(cantidadCargoF.value) * -1;
				document.getElementById('txtTotContrib2').value = parseFloat(cantidadCargoF.value) * -1;
				document.getElementById('txtTotAplic2').value = parseFloat(cantidadCargoF.value) * -1;
				document.getElementById('txtCntAcargo').value = parseFloat(cantidadCargoF.value) * -1;
				document.getElementById('txtAPagar2').value = parseFloat(cantidadCargoF.value) * -1;
				document.getElementById('txtTotAplic2_1').value = 0;

			}
	}

	function impFavor(monto){
		let res = parseFloat(cantidadCargo.value) - parseFloat(monto);
		cantidadCargoT.value = res.toFixed(2);
	}
	function msgCaptura(){
		alert("En este apartado se capturan cada uno de los elementos");
	}

	function ivaAcred(){
		var myModal = new bootstrap.Modal(document.getElementById('modal1'));
		
		// Mostrar el modal
		myModal.show();
	}

	function mdInst1(){
		var myModal1 = new bootstrap.Modal(document.getElementById('instMd1'));
		
		// Mostrar el modal
		myModal1.show();
	}
	function sumarCompen(monto){
		let total = parseFloat(cantidadCargoT.value);
		total -= monto;
		sumarApli();

	}
	function sumarEstimulos(monto){
		let total = parseFloat(cantidadCargoT.value);
		total -= monto;
		sumarApli();
	}

	function sumarApli(){
		let c = parseFloat(document.getElementById('txtcompensaciones').value);
		let e = parseFloat(document.getElementById('txtestimulos').value);
		document.getElementById('txtTotAplic2_1').value = (c + e).toFixed(2);
		document.getElementById('txtAPagar2').value = (parseFloat(document.getElementById('txtTotContrib2').value) - (c + e)).toFixed(2);
		if(c == 0 && e == 0){
			document.getElementById('txtCntAcargo').value =  document.getElementById('txtTotContrib2').value;	
		}else{
			document.getElementById('txtCntAcargo').value = ((c + e)).toFixed(2);
		}

	}

	
</script>