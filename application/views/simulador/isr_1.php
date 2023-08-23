<style type="text/css">
	.text-span{
		color: white;
		border: 2px solid red;
		font-size: 12px;
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
</style>
<div class="container mt-3 ">
	<h3><strong>ISR simplificado de confianza.Personas físicas</strong></h3>
	<hr class="shadow p-1">
	<div class="row p-3">
		<div class="col-lg-2">
			<button class="btn btn-outline-dark w-100 h-100" data-bs-toggle="modal" data-bs-target="#message2">INSTRUCCIONES</button>
		</div>
		<div class="col-lg-4"></div>
		<div class="col-lg-4">
			<button class="bg-red btn text-white w-100 h-100" onclick="saveData(1);">ADMINISTRACIÓN DE LA DECLARACIÓN</button>
		</div>
		<div class="col-lg-2">
			<button class="bg-red btn text-white w-100 h-100"  onclick="saveData(0);">GUARDAR</button>
		</div>
	</div>
	<br>
	<div class="row bg-light rounded text-body p-3">
		<div class="col-lg-1"></div>
		<div class="col-lg-10">
			<!-- Nav tabs -->
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active text-body" data-bs-toggle="tab" href="#ingresos"><i class="material-icons" id="endedspanIngresos">&#xe5ca;</i> Ingresos <span class="rounded-5 bg-blood text-span shadow align-top p-1" id="spanIngresos"></span></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-body disabled" data-bs-toggle="tab" href="#determinacion" id="linkDeterminacion" onclick="setData(0);"><i class="material-icons" id="endedspanDeterminacion">&#xe5ca;</i>Determinacion <span class="rounded-5 bg-blood text-span shadow align-top p-1" id="spanDeterminacion"></a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link text-body disabled" data-bs-toggle="tab" href="#pago" id="linkPago" onclick="setData(1);"><i class="material-icons" id="endedspanPago" >&#xe5ca;</i>Pago <span class="rounded-5 bg-blood text-span shadow align-top p-1 disabled" id="spanPago"></a>
			  </li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content bg-white">
				<div class="tab-pane container active" id="ingresos">
					<form id="frmIngresos">
							<div class="row">
								<div class="col-lg-6 p-2">
									<p class="msg-muted">Los campos marcados con asterisco (*) son obligatorios</p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 d-flex align-items-end">
									<p class="questions">* Los ingresos fueron obtenidos a través de copropiedad?</p>
								</div>
								<div class="col-lg-4  d-flex justify-content-end p-2">
									<select class="inputQuestion form-select w-75 no-spin" required id="txtCopropiedadIngresos">
										<option>Selecciona</option>
										<option value="Si">Si</option>
										<option value="No" selected>No</option>
									</select>
								</div>
								<div class="col-lg-3"></div>
							</div>

							<div class="row">
								<div class="col-lg-4  d-flex align-items-end">
									<p class="questions align-bottom">Total de ingresos efectivamente cobrados</p>
								</div>
								<div class="col-lg-4  d-flex justify-content-end p-2">
									<input class="inputQuestion text-end form-control  w-75 no-spin" type="number"  min="0.00" step="0.05" name="txtTotalIngresos"  id="txtTotalIngresos" required onchange="totFinal();"> 
								</div>
								<div class="col-lg-3"></div>
							</div>

							<div class="row">
								<div class="col-lg-4 d-flex align-items-end">
									<p class="questions">Descuentos devoluciones y bonificaciones</p>
								</div>
								<div class="col-lg-4 d-flex justify-content-end p-2">
									<label ><strong>(-)</strong></label><input class="inputQuestion text-end form-control w-75 no-spin"  type="number" min="0.00" step="0.05" name="txtDescuentosIngresos"  id="txtDescuentosIngresos" required onchange="rest(this.value);"> 
								</div>
								<div class="col-lg-3 d-flex justify-content-aroud align-items-center">
									<button class="btn btn-outline-secondary btn-sm" onclick="capturaDevol1();" type="button">CAPTURAR</button>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4 d-flex align-items-end">
									<p class="questions">*Ingresos a disminuir</p>
								</div>
								<div class="col-lg-4 d-flex justify-content-end p-2">
									<label ><strong>(-)</strong></label><input class="inputQuestion text-end form-control w-75 no-spin"  type="number" min="0.00" step="0.05" name="txtDisminuirIngresos"  id="txtDisminuirIngresos" required onchange="rest(this.value);"> 
								</div>
								<div class="col-lg-3 d-flex justify-content-aroud align-items-center">
									<button class="btn btn-outline-secondary btn-sm" onclick="capIngresosDis();" type="button">CAPTURAR</button>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4 d-flex align-items-end">
									<p class="questions">*Ingresos adicionales</p>
								</div>
								<div class="col-lg-4 d-flex justify-content-end p-2">
									<label ><strong>(+)</strong></label><input class="inputQuestion text-end form-control w-75 no-spin"  type="number" min="0.00" step="0.05" name="txtAdicionalesIngresos"  id="txtAdicionalesIngresos" required onchange="sum(this.value);"> 
								</div>
								<div class="col-lg-3 d-flex justify-content-aroud align-items-center">
									<button class="btn btn-outline-secondary btn-sm" onclick="capIngresosAd();" type="button">CAPTURAR</button>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-4 d-flex align-items-end">
									<p class="questions"><strong>Total de ingresos percibidos por la actividad</strong></p>
								</div>
								<div class="col-lg-4 d-flex justify-content-end p-2">
									<label ><strong>(=)</strong></label><input class="inputQuestion text-end form-control w-75 no-spin"  type="number" name="txtTotalIngresos_Ingresos"  id="txtTotalIngresos_Ingresos"  onchange="actTotal(this.value);" disabled> 
								</div>
								<div class="col-lg-3 d-flex justify-content-aroud align-items-center">
									<!--<button class="btn btn-outline-secondary btn-sm" onclick="msgCaptura();" type="button">CAPTURAR</button>-->
								</div>
							</div>
						</form>
				</div>
					
				<div class="tab-pane container fade" id="determinacion">
					<form id="frmDeterminacion">
							<div class="row">
								<div class="col-lg-6 p-2">
									<p class="msg-muted">Los campos marcados con asterisco (*) son obligatorios</p>
								</div>
							</div>
							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Total de ingresos por la actividad</strong>
								</div>
								<div class="col-lg-1"></div>
								<div class="col-lg-3">
									<input type="number"  step="0.05"  name="txtTotalIngresos_Determinacion" id="txtTotalIngresos_Determinacion" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-3">
									
								</div>
							</div>
							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Base gravable</strong>
								</div>
								<div class="col-lg-1 text-end  no-spin"><strong>(=)</strong></div>
								<div class="col-lg-3 ">
									<input type="number"  step="0.05"  name="txtBaseGravable" id="txtBaseGravable" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-3">
									
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">Taza aplicable</p>
								</div>
								<div class="col-lg-1 text-end "><strong>(x)</strong></div>
								<div class="col-lg-3 ">
									<input type="text" name="txtTazaAplicable" id="txtTazaAplicable" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-3">
									
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Impuesto mensual</strong>
								</div>
								<div class="col-lg-1 text-end "><strong>(=)</strong></div>
								<div class="col-lg-3 ">
									<input type="number"  step="0.05"  name="txtImpuestoMensual" id="txtImpuestoMensual" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-3">
									
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">ISR retenido por personas morales</p>
								</div>
								<div class="col-lg-1 text-end "><strong>(-)</strong></div>
								<div class="col-lg-3 ">
									<input type="number"  step="0.05"  name="txtISRretenido" id="txtISRretenido" class="form-control text-end  no-spin" required onchange="restDet(this.value);">
								</div>
								<div class="col-lg-3 text-center text-start">
									<button class="btn btn-outline-secondary btn-sm">VER DETALLE</button>
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Impuesto a cargo</strong>
								</div>
								<div class="col-lg-1 text-end "><strong>(=)</strong></div>
								<div class="col-lg-3 ">
									<input type="number"  step="0.05"  name="txtImpuestoCargo" id="txtImpuestoCargo" class="form-control text-end  no-spin" disabled>
								</div>
								<div class="col-lg-3">
									
								</div>
							</div>
					</form>
				</div>
			  
				<div class="tab-pane container fade" id="pago">
					<form id="frmPago">
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
									<input type="number"  step="0.05"  name="txtAcargo" id="txtAcargo" class="form-control text-end  no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Total de contribuciones</strong>
								</div>
								<div class="col-lg-1 text-end"><strong>(=)</strong></div>
								<div class="col-lg-3">
									<input type="number"  step="0.05"  name="txtTotCont1" id="txtTotCont1" class="form-control text-end  no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">Subsidio para el empleo</p>
								</div>
								<div class="col-lg-1  text-end"></div>
								<div class="col-lg-3">
									<input type="number"  step="0.1"  name="txtSubsidioPago" id="txtSubsidioPago" class="form-control text-end no-spin" onchange="minus(this.value);" required>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">*¿Tienes compensaciones por aplicar?</p>
								</div>
								<div class="col-lg-1 text-end"></div>
								<div class="col-lg-3">
									<select class="form-select" id="txtCompensaciones" name="txtCompensaciones" onchange="actComp(this.value);">
										<option value ="1">Seleccione opción</option>
										<option value="0">Si</option>
										<option value="1">No</option>
									</select>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">*Compensaciones</p>
								</div>
								<div class="col-lg-1 text-end no-spin"></div>
								<div class="col-lg-3">
									<input type="number"  min="0.00"  name="txtCompensaccionesPago" id="txtCompensaccionesPago" class="form-control text-end no-spin" onchange="minus1(this.value);" disabled value='0'>
								</div>
								<div class="col-lg-4">
									<button class="btn btn-outline-secondary btn-sm" onclick="msgCaptura();" type="button">CAPTURAR</button>	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Total de aplicaciones</strong>
								</div>
								<div class="col-lg-1 text-end"><strong>(=)</strong></div>
								<div class="col-lg-3">
									<input type="number"  value = '0'  name="txtTotalAplicaciones" id="txtTotalAplicaciones" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<hr>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">Total de contribuciones</p>
								</div>
								<div class="col-lg-1 text-end"></div>
								<div class="col-lg-3">
									<input type="number"  step="0.05"  name="txtTotCont" id="txtTotCont" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">Total de aplicaciones</p>
								</div>
								<div class="col-lg-1 text-end"><strong>(-)</strong></div>
								<div class="col-lg-3">
									<input type="number"  step="0.05"  name="txtTotApli" id="txtTotApli" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<p class="questions">Cantidad a cargo</p>
								</div>
								<div class="col-lg-1 text-end"><strong>(=)</strong></div>
								<div class="col-lg-3">
									<input type="number"  step="0.05"  name="txtCantCargo" id="txtCantCargo" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>

							<div class="row p-2">
								<div class="col-lg-4 ">
									<strong class="questions">Cantidad a pagar</strong>
								</div>
								<div class="col-lg-1 text-end"><strong>(=)</strong></div>
								<div class="col-lg-3 ">
									<input type="number"  step="0.05"  name="txtCantPagar" id="txtCantPagar" class="form-control text-end no-spin" disabled>
								</div>
								<div class="col-lg-4">	
								</div>
							</div>
					</form>
				</div>

			</div>
		</div>
		<div class="col-lg-1 "></div>
	</div>
	<br>
	
	
</div>

<!-- MODAL -->

<div class="modal fade" id="message2">
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
        		<ol>
        			<li>Con la información de las facturas emitidas en el mes que deseas declarar, se pre llenó el importe de tus Ingresos cobrados al mes.</li>
        			<li>En caso de tener ingresos adicionales en el mes captura el monto en Ingresos adicionales al mes.</li>
        			<li>Una vez que se haya registrado la información, se habilitará el siguiente módulo.</li>
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
<br>
<br>
<br>
<br>
<br>

<script type="text/javascript">

	let saved = false;

	let txtTotalIngresos_Ingresos = document.getElementById('txtTotalIngresos_Ingresos');
	let txtTotalIngresos_Determinacion = document.getElementById('txtTotalIngresos_Determinacion');
	let txtTotalGastos = document.getElementById('txtTotalIngresos');

	let sI = document.getElementById('spanIngresos');
	let sD = document.getElementById('spanDeterminacion');
	let sP = document.getElementById('spanPago');

	sI.style.display = 'none'; 
	sD.style.display = 'none'; 
	sP.style.display = 'none'; 

	// Esperar a que la página se cargue completamente
	document.addEventListener('DOMContentLoaded', function() {
	  // Obtener el modal por su ID
	  var myModal = new bootstrap.Modal(document.getElementById('message2'));

	  // Mostrar el modal
	  myModal.show();
	  countInputs('frmIngresos','spanIngresos');
	  countInputs('frmDeterminacion','spanDeterminacion');
	  countInputs('frmPago','spanPago');

	});

	let txtCompensaccionesPago = document.getElementById('txtCompensaccionesPago');

	function actComp(val){
		if(val == 0){
			document.getElementById('txtCompensaccionesPago').disabled = false;
		}else{
			document.getElementById('txtCompensaccionesPago').disabled = true;
		}
	}

	function totFinal(){
		let tot = txtTotalGastos.value;
		txtTotalIngresos_Ingresos.value = tot;
	}

	function rest(cant){
		let tot = parseFloat(txtTotalIngresos_Ingresos.value);
		cant = parseFloat(cant);
		tot -= cant;
		txtTotalIngresos_Ingresos.value = tot.toFixed(2);
	}

	function sum(cant){
		let tot = parseFloat(txtTotalIngresos_Ingresos.value);
		cant = parseFloat(cant);
		tot += cant;
		txtTotalIngresos_Ingresos.value = tot.toFixed(2);
	}

	function actTotal(cant){
		alert(cant);
		txtTotalIngresos_Determinacion.value = cant;
	}


	

	// Agregar un evento de escucha al formulario para contar campos en blanco
	function countInputs(form,span){
	// Obtener referencias al formulario y al contador
		let icon = "ended" + span;
		const ended = document.getElementById(icon);
		const myForm = document.getElementById(form);
		const countSpan = document.getElementById(span);
		
		let blankCount = 0;
		const inputs = myForm.querySelectorAll('input[required]');
		
		for (let i = 0; i < inputs.length; i++) {
		  if (inputs[i].value.trim() === '') {
		    blankCount++;
		  }
		}
		
		countSpan.innerHTML = blankCount;
		
		if (blankCount === 0) {
		  ended.style.display = 'inline';
		  countSpan.style.display = 'none';
		}
		else{
		  ended.style.display = 'none';
		  countSpan.style.display = 'inline';

		}
	}  
	
	let baseGravable = document.getElementById('txtBaseGravable');
	let impuestoMensual = document.getElementById('txtImpuestoMensual');
	let taza = document.getElementById('txtTazaAplicable');
	let impuestoCargo = document.getElementById('txtImpuestoCargo');
	let acargo = document.getElementById('txtAcargo');
	let subsidioPago = document.getElementById('txtSubsidioPago');
	let compensaciones = document.getElementById('txtCompensaciones');
	let compensaccionesPago = document.getElementById('txtCompensaccionesPago');
	let totalAplicaciones = document.getElementById('txtTotalAplicaciones');
	let totCont = document.getElementById('txtTotCont1');
	let totCont1 = document.getElementById('txtTotCont');
	let totApli = document.getElementById('txtTotApli');
	let cantCargo = document.getElementById('txtCantCargo');
	let cantPagar = document.getElementById('txtCantPagar');
	let coIngresos = document.getElementById('txtCopropiedadIngresos');
	let totIngresos = document.getElementById('txtTotalIngresos');
	let descIngresos = document.getElementById('txtDescuentosIngresos');
	let disIngresos = document.getElementById('txtDisminuirIngresos');
	let adIngresos = document.getElementById('txtAdicionalesIngresos');
	let totInIngresos = document.getElementById('txtTotalIngresos_Ingresos');
	let iSRretenido = document.getElementById('txtISRretenido');
	let compensacionesPago = document.getElementById('txtCompensaccionesPago');
	
	document.addEventListener('input', function () {
		countInputs('frmIngresos','spanIngresos');
	  countInputs('frmDeterminacion','spanDeterminacion');
	  countInputs('frmPago','spanPago');
	  if (totIngresos.validity.valid && descIngresos.validity.valid && disIngresos.validity.valid  && adIngresos.validity.valid ) {
	  	document.getElementById('linkDeterminacion').classList.remove('disabled');
	  } else {
	    document.getElementById('linkDeterminacion').classList.add('disabled');
	  }
	  if (iSRretenido.validity.valid ) {
	  	document.getElementById('linkPago').classList.remove('disabled');
	  } else {
	    document.getElementById('linkPago').classList.add('disabled');
	  }
	});
	let data = {};
	let env = false;
	let totInDet = document.getElementById('txtTotalIngresos_Determinacion');

	function saveData(op){
			let eIdDeclaracion = <?php 
			if(isset($_GET['eIdDeclaracion'])){
				echo $_GET['eIdDeclaracion'];
			}
			if(isset($_POST['eIdDeclaracion'])){
				echo $_POST['eIdDeclaracion'];
			}
		  ?>;
		data.coIngresos= coIngresos.value;
		data.fkeIdDeclaracion = parseInt(eIdDeclaracion);
		if(totIngresos.validity.valid && descIngresos.validity.valid && disIngresos.validity.valid && adIngresos.validity.valid){
			data.totIngresos = parseFloat(totIngresos.value).toFixed(2);
			data.descIngresos = parseFloat(descIngresos.value).toFixed(2);
			data.disIngresos = parseFloat(disIngresos.value).toFixed(2);
			data.adIngresos = parseFloat(adIngresos.value).toFixed(2);
			env =  true;
		}else{
			env =  false;
			alert("Completa los campos de INGRESOS!!");
		}

		if (iSRretenido.validity.valid) {
			data.iSRretenido = parseFloat(iSRretenido.value).toFixed(2);
			env =  true;
		}else{
			env =  false;
			alert("Completa los campos de DETERMINACIÓN!!");
		}

		if (subsidioPago.validity.valid) {
			data.subsidioPago = parseFloat(subsidioPago.value).toFixed(2);
			
			env =  true;
		}else{
			env =  false;
			alert("Completa los campos de PAGO!!");
		}
		if (compensacionesPago.value!= '') {
			data.compensacionesPago = parseFloat(compensacionesPago.value).toFixed(2);
		}else{
			data.compensacionesPago = parseFloat('0').toFixed(2);
		}
		data.catPagar = parseFloat(cantPagar.value).toFixed(2);
		data.flEfectivos = parseFloat(txtTotalIngresos.value).toFixed(2);
		data.flTotalIngresos_Determinacion = parseFloat(txtTotalIngresos_Determinacion.value).toFixed(2);
		data.flBaseGravable = parseFloat(baseGravable.value).toFixed(2);
		data.txtTasaAplicable = taza.value;
		data.flImpuestoMensual = parseFloat(impuestoMensual.value).toFixed(2);
		data.flImpuestoCargoIsr = parseFloat(impuestoCargo.value).toFixed(2);
		data.flCntAcargo = parseFloat(acargo.value).toFixed(2);
		data.flTotalContribuciones = parseFloat(totCont.value).toFixed(2);
		data.flCompensacionesPago = parseFloat(compensaccionesPago.value).toFixed(2);
		data.flAplicacionesPago = parseFloat(totalAplicaciones.value).toFixed(2);
		data.flTotalContribucionesPago = parseFloat(totCont1.value).toFixed(2);
		data.flAplicaciones = parseFloat(totalAplicaciones.value).toFixed(2);
		data.flCantidadCargo= parseFloat(cantCargo.value).toFixed(2);

		if(env){
			if(saved){
					history.back();
					return;
			}else{
			  	axios.post("<?php echo site_url('isr1'); ?>" ,data).then(
					function(res){
			        if (res.status == 200) {
			        	if(res.data){
			        			console.log(res.data);
			        			console.log(data);
			          		alert("Datos agregados correctamente!");
	          				disableAll();
	          				saved = true;
	          				return;
		          	}
		          	else{
			          		alert("No se han guardado los datos");
		          	}
		          }
			    	}).catch(function(err){
			        alert(err);
			        console.log(err);
			    	});
			}
  		
		}
		 

	}

	

	function setData(op){

		let impMensual;
		let cant = txtTotalIngresos_Ingresos.value;
		if(op == 0){
			totInDet.value = cant;
			baseGravable.value = cant;
			if(parseFloat(cant) <= 25000){
				taza.value ="1.00%";
				impMensual = (parseFloat(cant) * 0.01).toFixed(2); 

			}else if(parseFloat(cant) <= 50000){
				taza.value ="1.10%";
				impMensual = (parseFloat(cant) * 0.011).toFixed(2); 

			}else if(parseFloat(cant) <= 83333.33){
				taza.value ="1.50%";
				impMensual = (parseFloat(cant) * 0.015).toFixed(2); 

			}else if(parseFloat(cant) <= 208333.33){
				taza.value ="2.00%";
				impMensual = (parseFloat(cant) * 0.02).toFixed(2); 

			}else if(parseFloat(cant) <= 3500000){
				taza.value ="2.50%";
				impMensual = (parseFloat(cant) * 0.025).toFixed(2); 

			}

			impuestoMensual.value = impMensual;
		}if(op == 1){
			let imp = parseFloat(impuestoCargo.value);
			acargo.value = imp.toFixed(2);
			totCont.value = imp.toFixed(2);
			totCont1.value = imp.toFixed(2);
			let tot = parseFloat(totalAplicaciones.value);
			totApli.value = tot.toFixed(2);
		}
		
		
	}

	function restDet(val){
		let res = parseFloat(impuestoMensual.value) - parseFloat(val);
		impuestoCargo.value = res.toFixed(2);
	}

	function minus(val){
		let tot = parseFloat(totCont1.value) - parseFloat(val);
		totApli.value = val;
		cantCargo.value = tot.toFixed(2);
		cantPagar.value = tot.toFixed(2);
	}
	function minus1(val){
			let tot = parseFloat(cantCargo.value) - parseFloat(val);
			totApli.value = (parseFloat(totApli.value) + parseFloat(val)).toFixed(2);
			cantCargo.value = tot.toFixed(2);
			cantPagar.value = tot.toFixed(2);
		}

			function disableAll() {
			  var inputs = document.querySelectorAll("input");
			  inputs.forEach(function(input) {
			    input.disabled = true;
			  });

			  var selects = document.querySelectorAll("select");
			    selects.forEach(function(select) {
			      select.disabled = true;
			    });
			}
			function msgCaptura(){
		alert("En este apartado se capturan cada uno de los elementos");
	}
</script>
<!-- Modal Devoluciones, descuentos y bonificaciones facturadas -->
<div class="modal fade" id="modDev1">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-blood text-white">
        <h4 class="modal-title">Devoluciones, descuentos y bonificaciones facturadas</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
        <div class="row">
        	<div class="col-xl-12">
        		<p class="text-medium">
        			A continuación se muestra el detalle de prellenado de las devoluciones, descuentos y bonificaciones del periodo, este detalle lo puedes consultar en el visor de facturas emitidas y recibidas.
        		</p>
        	</div>
        </div>
        <div class="row">
        	<div class="col-xl-12">
        		<p class="text-medium">
        			<strong>
        				Suma de facturas emitidas de tipo egrso del mes con método de pago "Pago en una sola exhibisión" (PUE).
        			</strong>
        		</p>
        	</div>
        	<div class="table-responsive container">
        		<table class="table table-bordered">
        		   <thead>
        		     <tr class="text-center">
        		       <th class="text-medium">Mes</th>
        		       <th class="text-medium">Número de facturas Canceladas</th>
        		       <th class="text-medium">Número de facturas Vigentes</th>
        		       <th class="text-medium">Subtotal</th>
        		       <th class="text-medium">Descuento</th>
        		       <th class="text-medium">Subtotal-Descuento</th>
        		     </tr>
        		   </thead>
        		   <tbody>
        		     <tr class="table-active">
        		       <td class="text-medium text-start" id="txtMes"></td>
        		       <td class="text-medium text-end">0</td>
        		       <td class="text-medium text-end">0</td>
        		       <td class="text-medium text-end"></td>
        		       <td class="text-medium text-end"></td>
        		       <td class="text-medium text-end"></td>
        		     </tr>
        		   </tbody>
        		 </table>
        	</div>

        	<div class="row">
        		<div class="col-lg-4">
        			<p class="text-medium text-start">
        				<strong>
        					Descuentos, devoluciones y bonificaciones amparadas por comprobantes fiscales de egresos
        				</strong>
        			</p>
        		</div>
        		<div class="col-lg-1"></div>
        		<div class="col-lg-3">
        			<input type="text" name="txtEgresos" class="form-control text-end text-medium" value='0' disabled>
        		</div>
        	</div>

        	<div class="row">
        		<div class="col-lg-4">
        			<p class="text-medium text-start">
        					*Descuentos, devoluciones y bonificaciones de integrantes por copropiedad
        			</p>
        		</div>
        		<div class="col-lg-1">
        			<strong class="text-medium text-end">(-)</strong>
        		</div>
        		<div class="col-lg-3">
        			<input type="text" name="txtEgresos" class="form-control text-end text-medium" value="0" disabled>
        		</div>
        		<div class="col-lg-4">
        			<p class="text-medium text-end">
        				<strong>
        				* Este dato es el que se deberá ingresar en el formulario fuera de la ventana emergente
        				</strong>
        			</p>
        		</div>
        	</div>

        	<div class="row">
        		<div class="col-lg-4">
        			<p class="text-medium text-start">
        				<strong>
        					Total de descuentos, devoluciones y bonificaciones amparadas por comprobantes fiscales de egresos
        				</strong>
        					
        			</p>
        		</div>
        		<div class="col-lg-1">
        			<strong class="text-medium text-end">(=)</strong>
        		</div>
        		<div class="col-lg-3">
        			<input type="text" name="txtEgresos" class="form-control text-end text-medium" value="0" disabled>
        		</div>
        		
        	</div>

        </div>
       
       	
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      		<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="mdDisIngresos">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-blood text-white">
        <h4 class="modal-title">Ingresos a disminuir</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
       	<div class="rounded shadow p-4 mb-4 bg-white">
       		<div class="row">
       			<div class="col-lg-2">
       				<p class="text-medium">* Concepto</p>
       			</div>
       			<div class="col-lg-4">
       				<select class="form-select text-medium">
       					<option>Selecciona</option>
       					<option>Sin ingresos a disminuir</option>
       					<option>IEPS cobrado no trasladado de manera expresa y por separado</option>
       					<option>Ingresos facturados pendientes de cancelación con aceptación del receptor</option>
       					<option>Ingresos facturados acumulados en periodos anteriores</option>
       					<option>Apoyos gubernamentales</option>
       					<option>Ingresos facturados a terceros</option>
       				</select>
       			</div>

       			<div class="col-lg-2">
       				<input type="text" class="form-control-plaintext text-center text-bold text-medium" placeholder="Importe">
       			</div>

       			<div class="col-lg-4">
       				<input type="text" class="form-control" name="txtImporteTot" disabled >
       			</div>

       		</div>
       		<br>
       		<div class="row">
       			<div class="col-lg-4"></div>
       			<div class="col-lg-2"></div>
       			<div class="col-lg-2">
       				<button class="btn btn-outline-secondary text-medium "> AGREGAR </button>
       			</div>
       			
       		</div>
       		
       	</div>
       		<br>

       	<div class="table-responsive">
       		<table class="table table-bordered" id="tblConcepts1">
       			<thead class="text-center text-medium">
       				<tr>
       					<th>Concepto</th>
       					<th>Importe</th>
       					<th>Eliminar</th>
       				</tr>
       			</thead>
       			<tbody>
       				<div id="txtConcepto"></div>
       			</tbody>
       		</table>
       	</div>

       	<div class="row">
       		<div class="col-lg-12">
       			<ul class="pagination justify-content-center ">
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">Anterior</a></li>
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">1</a></li>
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">...</a></li>
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">Siguiente</a></li>
					  </ul>
       		</div>
       	</div>

       	<div class="row">
       		<div class="col-lg-5">
       			<p class="text-medium text-bold">
       				** Ingresos a Disminuir
       			</p>
       		</div>
       		<div class="col-lg-3">
       			<input type="text" name="txtImporteDisminuir" id="txtImporteDisminuir" class="form-control text-end text-medium" disabled value="0">
       		</div>
       	</div>
       	<br>
       	<div class="row">
       		<div class="col-lg-7"></div>
       		<div class="col-lg-5 text-end">
       			<p class="text-small text-bold">
       			 * Listado de conceptos válidos a disminuir <br>
       			 ** La suma total de los importes de cada concepto se suman y es el dato que se registra en el formulario de Ingresos a Disminuir
       			</p>
       		</div>
       	</div>
       	
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      		<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>

    </div>
  </div>
</div>


<div class="modal fade" id="mdIngresosAd">
  <div class="modal-dialog modal-xl modal-dialog-centered">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header bg-blood text-white">
        <h4 class="modal-title">Ingresos adicionales</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body container">
       	<div class="rounded shadow p-4 mb-4 bg-white">
       		<div class="row">
       			<div class="col-lg-2">
       				<p class="text-medium">* Concepto</p>
       			</div>
       			<div class="col-lg-4">
       				<select class="form-select text-medium">
       					<option>Selecciona</option>
       					<option>Sin ingresos a disminuir</option>
       					<option>IEPS cobrado no trasladado de manera expresa y por separado</option>
       					<option>Ingresos facturados pendientes de cancelación con aceptación del receptor</option>
       					<option>Ingresos facturados acumulados en periodos anteriores</option>
       					<option>Apoyos gubernamentales</option>
       					<option>Ingresos facturados a terceros</option>
       				</select>
       			</div>

       			<div class="col-lg-2">
       				<input type="text" class="form-control-plaintext text-center text-bold text-medium" placeholder="Importe">
       			</div>

       			<div class="col-lg-4">
       				<input type="text" class="form-control" name="txtImporteTot" disabled >
       			</div>

       		</div>
       		<br>
       		<div class="row">
       			<div class="col-lg-3"></div>
       			<div class="col-lg-2"></div>
       			<div class="col-lg-4">
       				<button class="btn btn-outline-secondary text-medium"> GUARDAR</button>
       			
       				<button class="btn btn-outline-secondary text-medium"> CANCELAR</button>
       			</div>
       			
       		</div>
       		
       	</div>
       		<br>

       	<div class="table-responsive">
       		<table class="table table-bordered" id="tblConcepts1">
       			<thead class="text-center text-medium">
       				<tr>
       					<th>Concepto</th>
       					<th>Importe</th>
       					<th>Eliminar</th>
       				</tr>
       			</thead>
       			<tbody>
       				<div id="txtConcepto"></div>
       			</tbody>
       		</table>
       	</div>

       	<div class="row">
       		<div class="col-lg-12">
       			<ul class="pagination justify-content-center ">
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">Anterior</a></li>
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">1</a></li>
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">...</a></li>
					    <li class="page-item "><a class="page-link text-dark text-medium" href="javascript:void(0);">Siguiente</a></li>
					  </ul>
       		</div>
       	</div>

       	<div class="row">
       		<div class="col-lg-5">
       			<p class="text-medium text-bold">
       				** Ingresos adicionales
       			</p>
       		</div>
       		<div class="col-lg-3">
       			<input type="text" name="txtImporteDisminuir" id="txtImporteDisminuir" class="form-control text-end text-medium" disabled value="0">
       		</div>
       	</div>
       	<br>
       	<div class="row">
       		<div class="col-lg-7"></div>
       		<div class="col-lg-5 text-end">
       			<p class="text-small text-bold">
       			 * Listado de conceptos válidos adicionales <br>
       			 ** La suma total de los importes de cada concepto se suman y es el dato que se registra en el formulario de Ingresos adicionales
       			</p>
       		</div>
       	</div>
       	
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      		<button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">CERRAR</button>
      </div>

    </div>
  </div>
</div>

<script type="text/javascript">


	function capturaDevol1(){
		var txtMes = document.getElementById('txtMes');
			var modDev1 = new bootstrap.Modal(document.getElementById('modDev1'));
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
			        	txtMes.innerHTML = data.txtPeriodo;
		          }
			    	}).catch(function(err){
			        alert(err);
			        console.log(err);
			    	});
			// Mostrar el modal
			modDev1.show();
	}

	function capIngresosDis(){
			var modDev2 = new bootstrap.Modal(document.getElementById('mdDisIngresos'));
				
			// Mostrar el modal
			modDev2.show();
	}

	function capIngresosAd(){
			var modDev3 = new bootstrap.Modal(document.getElementById('mdIngresosAd'));
				
			// Mostrar el modal
			modDev3.show();
	}



	</script>

